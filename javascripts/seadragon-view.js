$(document).ready(function() {
  $('.openseadragon').each(function() {
    var currentViewer = $(this);
    var currentViewerID = currentViewer.attr('id');
    var recordID = $(this).data('record_id');
    var recordName = $(this).data('record_name');
    var iiifEndpoint = 'https://fitdil.fitnyc.edu/media/iiif/' + recordID + '/' + recordName + '/info.json';
    var viewer = OpenSeadragon({
      id: currentViewerID,
      prefixUrl: 'https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/images/',
      showNavigator: true,
      navigatorSizeRatio: 0.1,
      minZoomImageRatio: 0.8,
      maxZoomPixelRatio: 10,
      controlsFadeDelay: 1000,
      tileSources: iiifEndpoint
    });
    viewer.world.addHandler('add-item', function(event) {
      var tiledImage = event.item;
      tiledImage.addHandler('fully-loaded-change', function() {
        $(currentViewer).parent().children('.loader').remove();
      });
    });
  });

  $('.openseadragon-popup').click(function() {
    var currentViewer = $(this);
    var currentViewerID = currentViewer.attr('id');
    var seadragon_frame = $('<div class="openseadragon-full" id="' + currentViewerID + '-frame"><div class="loader"></div></div>');
    $(this).append(seadragon_frame);
    var recordID = $(this).data('record_id');
    var recordName = $(this).data('record_name');
    var iiifEndpoint = 'https://fitdil.fitnyc.edu/media/iiif/' + recordID + '/' + recordName + '/info.json';
    var viewer = OpenSeadragon({
      id: currentViewerID + '-frame',
      prefixUrl: 'https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/images/',
      showNavigator: true,
      navigatorSizeRatio: 0.1,
      minZoomImageRatio: 0.8,
      maxZoomPixelRatio: 10,
      controlsFadeDelay: 1000,
      tileSources: iiifEndpoint
    });
    viewer.setFullScreen(true).addHandler('full-screen', function(data) {
      if (!data.fullScreen) {
        setTimeout(function() {
          viewer.destroy();
        }, 300);
      };
    });
    viewer.world.addHandler('add-item', function(event) {
      var tiledImage = event.item;
      tiledImage.addHandler('fully-loaded-change', function() {
        $('.loader').remove();
      });
    });
  });
});