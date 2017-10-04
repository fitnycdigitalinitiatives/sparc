<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo social_tags(@$bodyclass); ?>

    <!-- Will build the page <title> -->
    <?php
        if (isset($title)) { $titleParts[] = strip_formatting($title); }
        $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Will fire plugins that need to include their own files in <head> -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Icon -->
    <link rel="icon" href="https://www.fitnyc.edu/images/display/buttons/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="https://www.fitnyc.edu/images/display/buttons/favicon.ico" type="image/x-icon">
    <!-- Need to add custom and third-party CSS files? Include them here -->
    <?php
        queue_css_url('//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic');
        queue_css_file('lib/bootstrap.min');
        queue_css_file('style');
        queue_css_file('fonts/font-awesome/css/font-awesome.min');
        echo head_css();
    ?>


    <!-- Need more JavaScript files? Include them here -->
    <?php
        queue_js_file('lib/bootstrap.min');
        queue_js_file('lib/typeahead.bundle.min');
        echo head_js();
    ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-107096384-1', 'auto');
      ga('send', 'pageview');

    </script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type='text/javascript'>
    jQuery(function ($) {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	</script>
  <script type='text/javascript'>
    jQuery(function ($) {
	  $('[data-toggle="popover"]').popover({
    container: 'body'
    })
	})
	</script>
  <script>
  jQuery(document).ready(function($){
    // Defining the local dataset
    var tags = {
      "Drawings":1606,
      "Dress accessories":795,
      "Watercolor":776,
      "Pencil":762,
      "Women's clothing":756,
      "Photographs":725,
      "Photograph":711,
      "Dresses":542,
      "Hats":495,
      "Headwear":471,
      "Halston, 1932-1990":439,
      "Bergdorf Goodman (New York, N.Y.)":400,
      "Mixed media":329,
      "Footwear":310,
      "Ink":302,
      "Shoes":301,
      "Miller, Jerry, 1927-":300,
      "Bergdorf Goodman":272,
      "Gouache":230,
      "Children's clothing":212,
      "Joseph Love, Inc.":200,
      "Love, Joseph, 1891?-1971":200,
      "Prints":160,
      "Eveningwear":122,
      "Outerwear":120,
      "Halston Studio":114,
      "Coats":108,
      "Suits":105,
      "Marker":70,
      "Wash":48,
      "Lithograph":46,
      "Sandals":46,
      "Charcoal":45,
      "Pants":40,
      "Balenciaga, Cristobal, 1895-1972":39,
      "Lucile, 1862-1935":37,
      "Lucile, Ltd.":37,
      "Lipnitzki, Boris":36,
      "Engraving":35,
      "Morris, Leslie":35,
      "Christian Dior, Inc.":34,
      "Pastel":31,
      "Pochoir":30,
      "Lopez, Antonio, 1943-1987":26,
      "Men's clothing":26,
      "Skirts":26,
      "Balmain, Pierre, 1914-1982":24,
      "Graphite":24,
      "Dior, Christian":23,
      "Whitehead, Joseph":22,
      "Boyd, Harvey":20,
      "Mr. Eric":20,
      "Grès, Alix, 1903-1993":19,
      "Saint Laurent, Yves":19,
      "Shirts":19,
      "Dessès, Jean, 1904-1970":18,
      "Laroche, Guy":18,
      "Paquin (Firm)":18,
      "Lepape, Georges, 1887-1971":17,
      "Valente, Alfredo":17,
      "Barbier, George, 1882-1932":16,
      "Chanel, Coco, 1883-1971":16,
      "Colored Pencils":16,
      "Barrios, Pedro":15,
      "Iribe, Paul, 1883-1935":15,
      "Chidnoff, Irving":14,
      "Esta":14,
      "Fabiani, Alberto":14,
      "Illustrated books":14,
      "L'Eventail et la fourrure chez Paquin":14,
      "Pochoir over lithograph":14,
      "Stavrinos, George, 1948-":14,
      "Wedding costumes":14,
      "Associated Fabrics Corp.":13,
      "Givenchy, Hubert de, 1927-":13,
      "Halston Studio for Jerry Silverman":13,
      "Jackets":12,
      "Jewelry":12,
      "Journal des Demoiselles":12,
      "Jumpers":12,
      "Kesslére, G. Maillard (George Maillard)":12,
      "Beaton, Cecil, 1904-1980":11,
      "Boots":11,
      "Clogs":11,
      "Cosmetics":11,
      "La Moda Elegante Ilustrada":11,
      "Fans":10,
      "Griffe, Jacques":10,
      "Halston Studio for Luksus":10,
      "Hood, Dorothy":10,
      "The Queen":10,
      "Bouché, René, 1906-1963":9,
      "Cornu, Paul, 1881-1914":9,
      "Crayon":9,
      "Draz, Tod":9,
      "Galerie des Modes et Costumes Français, Dessinés D'Aprčs Nature, 1778-1787":9,
      "Ricci, Nina":9,
      "Eric (Erickson), Carl":8,
      "Gustavson, Mats, 1951-":8,
      "La Gazette Rose":8,
      "Lanvin (Firm)":8,
      "Pierce, Daren":8,
      "Rompers":8,
      "Shabazz, Jamel (1960-)":8,
      "Crawford, Jay":7,
      "Félix, Auguste":7,
      "Gazette du Bon Ton: Arts, Modes & Frivolités":7,
      "Gloves":7,
      "Heim, Jacques":7,
      "Moss, Seymore":7,
      "Paper":7,
      "Patou (Firm)":7,
      "Pencil, watercolor and gouache on paper":7,
      "Schiaparelli, Elsa, 1890-1973":7,
      "Sportswear":7,
      "Watteau, François, 1758-1823":7,
      "Courrèges, André":6,
      "Fath, Jacques, 1912-1954":6,
      "Fur garments":6,
      "Ink and watercolor on paper":6,
      "Preval, E.":6,
      "Simonetta":6,
      "Sleepwear":6,
      "Blair, Mary":5,
      "Collage":5,
      "David, Jules, 1808-1892":5,
      "Hair ornaments":5,
      "Halston Studio for Partos":5,
      "Ink on paper":5,
      "Les Idées Nouvelles de la Mode":5,
      "Modes et Manieres d'Aujord'hui":5,
      "Patou, Jean, 1887-1936":5,
      "Pencil on vellum":5,
      "Pertegaz, Manuel, 1917-":5,
      "Swatches":5,
      "Swimwear":5,
      "Trčs Parisien: La Mode, le Chic l'Élégance":5,
      "A. Beller & Co.":4,
      "De Juan, Eric":4,
      "Drivon, Charles":4,
      "Giese, Al":4,
      "Halston Studio for Adele Simpson":4,
      "Handbags":4,
      "James, Charles, 1906-1978":4,
      "King, Muriel":4,
      "La France Élégante":4,
      "Larson, Esther":4,
      "Le Journal des Dames et des Modes":4,
      "Manuscripts":4,
      "Martine":4,
      "Neckties":4,
      "Parfums de Rosine (Firm)":4,
      "Pen":4,
      "Perfume":4,
      "Pimsler, Alvin":4,
      "Poiret, Paul":4,
      "Scaasi, Arnold":4,
      "Smocks":4,
      "Sweaters":4,
      "Tempera and swatches on printed paper":4,
      "Tissue":4,
      "Watercolor on vellum":4,
      "Wood":4,
      "Amies, Hardy, 1909-2003":3,
      "Ely, Richard":3,
      "Esler, Ronald":3,
      "Fur coats":3,
      "Galitzine, Irene, 1918-2006":3,
      "Geizinger, Jack":3,
      "Goldberg, Maurice":3,
      "Gonin, G.":3,
      "Halston Studio for Oscar Delarenta":3,
      "Halston Studio for Talmack":3,
      "Hattie Carnegie, Inc.":3,
      "Kaish, Morton":3,
      "L'Art et la Mode":3,
      "Monte Sano & Pruzan, Ltd.":3,
      "Nei, Carlos":3,
      "Pencil and watercolor on paper":3,
      "Perl, Erica":3,
      "Resortwear":3,
      "Staffs (Sticks, canes, etc.)":3,
      "Stipelman, Steven":3,
      "Underwear":3,
      "Valentino, 1932-":3,
      "Black and white phototransfer":2,
      "Cardin, Pierre, 1922-":2,
      "Chaillot, A.":2,
      "Creed, Charles, 1909-":2,
      "Croland, David":2,
      "Drian":2,
      "Grammer, June":2,
      "Halston Studio for Jane Derby":2,
      "Halston Studio for Kahan-Bill Smith":2,
      "Halston Studio for Teal Traina":2,
      "Kapp, Annaliese":2,
      "Klepper, Esther":2,
      "La Goűt du Jour":2,
      "La Mode Artistique":2,
      "La Mode Pratique: Journal de la Femme et de la Maison":2,
      "LeClere, Pierre-Thomas":2,
      "Lefranco":2,
      "Lingerie":2,
      "Lucy":2,
      "Molyneux, Edward Henry, 1891-1974":2,
      "Monarch Tailoring Co.":2,
      "Mooring, Mark":2,
      "Muray, Nickolas, 1892-1965":2,
      "Papinoff":2,
      "Parker, Bob":2,
      "Printed paper":2,
      "Purnell, Catherine":2,
      "Sandoz, Emile-Auguste, 1901-1964":2,
      "Schatt, Roy":2,
      "Shorts":2,
      "Siméon, Fernand, 1884-1928":2,
      "Tempera on printed paper":2,
      "Textiles on type-written paper":2,
      "Wax Pencils":2,
      "Wilson, Carl":2,
      "A.C.":1,
      "Acrylic":1,
      "Allen, Ted":1,
      "Allgemeine Moden-Zeitung":1,
      "American Fashion Review / Sartorial Art Journal":1,
      "American Gentleman and Sartorial Art Journal":1,
      "Apparel Arts":1,
      "Bakst, Léon, 1866-1924":1,
      "Belts":1,
      "Blau, Tom":1,
      "Blouses":1,
      "Bohan, Marc, 1926-":1,
      "Boutet de Monvel, Bernard":1,
      "Bow ties":1,
      "Cashin, Bonnie":1,
      "Charle, H.":1,
      "Cloaks":1,
      "Compte-Calix, François Claudius, 1813-1880":1,
      "De Casimacker":1,
      "Deferneville, P.":1,
      "Der Bazar":1,
      "Der Tage einer Dame":1,
      "Earley, Donald":1,
      "Eisenstaedt, Alfred":1,
      "Elia, Albert":1,
      "Elkus, Bruce":1,
      "English Women's Domestic Magazine":1,
      "Fox, Barbara":1,
      "Gallenga, Maria Monica":1,
      "Genio C. Scott":1,
      "Glax, Stephanie":1,
      "Gleason, Mary":1,
      "Glitter":1,
      "Gouache with acetate overlay":1,
      "Grangier, Jean":1,
      "Green, Norman":1,
      "Greenhill, Fred":1,
      "Guijol, A.":1,
      "H. Ch. [H. Charle]":1,
      "Hall, Arnold":1,
      "Halston Publicity":1,
      "Halston Studio Partos":1,
      "Halston Studio for Bill Smith":1,
      "Halston Studio for Jane Derby/Oscar Delarenta":1,
      "Halston Studio for Partos/Vogue":1,
      "Halston Studio for Revlon":1,
      "Halston Studio for Samuel R.":1,
      "Halston Studio for Sarmi":1,
      "Halston Studio for Utre":1,
      "Hannett, A.T.":1,
      "Hartnell, Norman":1,
      "Heliochrome":1,
      "Hosiery":1,
      "Howard, Jim":1,
      "Hurrell, George, 1904-1992":1,
      "Il Mondo Elegante":1,
      "Jno. J. Mitchell Co.":1,
      "Johnson, Doug":1,
      "L'Ami des Dames":1,
      "L'Art et la mode: Reproduction en noir et en couleurs de costumes, d'ameublements, de joyaux et de tous objets d'art servant de cadre ŕ l'el'egance et ŕ la beaut'e de la femme":1,
      "L'Illustrateur des Dames":1,
      "La Moda Cubana":1,
      "La Moda Elegante Illustrada":1,
      "La Moda Elegante llustrada":1,
      "La Mode Elegante Illustrada":1,
      "La Mode: Revue des Modes, Galerie des Moeurs, Album des Salons":1,
      "Lachasse, Ltd.":1,
      "Le Follet: journal du Grand Monde, Fashion, Polite Literature, Beaux Arts, etc.":1,
      "Le Moniteur de la Mode":1,
      "Le Salon de la Mode":1,
      "Leloir, Héloďse Colin, 1820-1873":1,
      "Les Choses de Paul Poiret Vues par Georges Lepape":1,
      "Les Robes de Paul Poiret / Racontées par Paul Iribe":1,
      "Lickona, Cheryl":1,
      "Lloyd, Gene":1,
      "Magasin des Demoiselles":1,
      "Mark, Mona":1,
      "Marker on paper":1,
      "Marty, A.-E. (André-Edouard), 1882-1974":1,
      "Mathieu, Dora":1,
      "Morrow, Tom, -1994":1,
      "Moutet, C.":1,
      "Obi":1,
      "Paquin, Jeanne, 1869-1936":1,
      "Peterson's Magazine":1,
      "Petit Courrier des Dames":1,
      "Phillip Sills & Co.":1,
      "Photocopies":1,
      "Photograph and collage":1,
      "Phototypie":1,
      "Raincoats":1,
      "Rozerwriski, Alex":1,
      "Ruegg":1,
      "Scott's Fashions":1,
      "Silkscreen":1,
      "Socks":1,
      "Souchet, A.":1,
      "Sunshine, Bob":1,
      "Tempera":1,
      "Textile on printed paper":1,
      "Toudouze, Anaďs Colin, 1822-1899":1,
      "Venet, Philippe":1,
      "Vests":1,
      "Zou Zou":1};
    // constructs the suggestion engine
    var tags = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: tags
    });

    $('.input-group #query').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    },
    {
    name: 'tags',
    source: tags
    });
  });
  </script>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php echo link_to_home_page('<img src="' . img('sparc_digital_header.png') . '" srcset="' . img('sparc_digital_header.png') . ' 1x, ' . img('sparc_digital_header_retina.png') . ' 2x" alt="SPARC Digital">', array('class' => 'navbar-brand')); ?>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<?php echo public_nav_main_bootstrap(); ?>
				<?php echo search_form(array('show_advanced' => false, 'form_attributes' => array('class' => 'navbar-form navbar-right', 'role' => 'search'))); ?>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

    </header>
    <main id="content" role="main">
      <div class="container">
          <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
