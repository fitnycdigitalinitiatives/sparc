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
  jQuery(function ($) {
    var availableTags = ["Drawings", "Dress accessories", "Watercolor", "Pencil", "Women's clothing", "Photographs", "Photograph", "Dresses", "Hats", "Headwear", "Halston, 1932-1990", "Bergdorf Goodman (New York, N.Y.)", "Mixed media", "Footwear", "Ink", "Shoes", "Miller, Jerry, 1927-", "Bergdorf Goodman", "Gouache", "Children's clothing", "Joseph Love, Inc.", "Love, Joseph, 1891?-1971", "Prints", "Eveningwear", "Outerwear", "Halston Studio", "Coats", "Suits", "Marker", "Wash", "Lithograph", "Sandals", "Charcoal", "Pants", "Balenciaga, Cristobal, 1895-1972", "Lucile, 1862-1935", "Lucile, Ltd.", "Lipnitzki, Boris", "Engraving", "Morris, Leslie", "Christian Dior, Inc.", "Pastel", "Pochoir", "Lopez, Antonio, 1943-1987", "Men's clothing", "Skirts", "Balmain, Pierre, 1914-1982", "Graphite", "Dior, Christian", "Whitehead, Joseph", "Boyd, Harvey", "Mr. Eric", "Grès, Alix, 1903-1993", "Saint Laurent, Yves", "Shirts", "Dessès, Jean, 1904-1970", "Laroche, Guy", "Paquin (Firm)", "Lepape, Georges, 1887-1971", "Valente, Alfredo", "Barbier, George, 1882-1932", "Chanel, Coco, 1883-1971", "Colored Pencils", "Barrios, Pedro", "Iribe, Paul, 1883-1935", "Chidnoff, Irving", "Esta", "Fabiani, Alberto", "Illustrated books", "L'Eventail et la fourrure chez Paquin", "Pochoir over lithograph", "Stavrinos, George, 1948-", "Wedding costumes", "Associated Fabrics Corp.", "Givenchy, Hubert de, 1927-", "Halston Studio for Jerry Silverman", "Jackets", "Jewelry", "Journal des Demoiselles", "Jumpers", "Kesslére, G. Maillard (George Maillard)", "Beaton, Cecil, 1904-1980", "Boots", "Clogs", "Cosmetics", "La Moda Elegante Ilustrada", "Fans", "Griffe, Jacques", "Halston Studio for Luksus", "Hood, Dorothy", "The Queen", "Bouché, René, 1906-1963", "Cornu, Paul, 1881-1914", "Crayon", "Draz, Tod", "Galerie des Modes et Costumes Français, Dessinés D'Aprčs Nature, 1778-1787", "Ricci, Nina", "Eric (Erickson), Carl", "Gustavson, Mats, 1951-", "La Gazette Rose", "Lanvin (Firm)", "Pierce, Daren", "Rompers", "Shabazz, Jamel (1960-)", "Crawford, Jay", "Félix, Auguste", "Gazette du Bon Ton: Arts, Modes & Frivolités", "Gloves", "Heim, Jacques", "Moss, Seymore", "Paper", "Patou (Firm)", "Pencil, watercolor and gouache on paper", "Schiaparelli, Elsa, 1890-1973", "Sportswear", "Watteau, François, 1758-1823", "Courrèges, André", "Fath, Jacques, 1912-1954", "Fur garments", "Ink and watercolor on paper", "Preval, E.", "Simonetta", "Sleepwear", "Blair, Mary", "Collage", "David, Jules, 1808-1892", "Hair ornaments", "Halston Studio for Partos", "Ink on paper", "Les Idées Nouvelles de la Mode", "Modes et Manieres d'Aujord'hui", "Patou, Jean, 1887-1936", "Pencil on vellum", "Pertegaz, Manuel, 1917-", "Swatches", "Swimwear", "Trčs Parisien: La Mode, le Chic l'Élégance", "A. Beller & Co.", "De Juan, Eric", "Drivon, Charles", "Giese, Al", "Halston Studio for Adele Simpson", "Handbags", "James, Charles, 1906-1978", "King, Muriel", "La France Élégante", "Larson, Esther", "Le Journal des Dames et des Modes", "Manuscripts", "Martine", "Neckties", "Parfums de Rosine (Firm)", "Pen", "Perfume", "Pimsler, Alvin", "Poiret, Paul", "Scaasi, Arnold", "Smocks", "Sweaters", "Tempera and swatches on printed paper", "Tissue", "Watercolor on vellum", "Wood", "Amies, Hardy, 1909-2003", "Ely, Richard", "Esler, Ronald", "Fur coats", "Galitzine, Irene, 1918-2006", "Geizinger, Jack", "Goldberg, Maurice", "Gonin, G.", "Halston Studio for Oscar Delarenta", "Halston Studio for Talmack", "Hattie Carnegie, Inc.", "Kaish, Morton", "L'Art et la Mode", "Monte Sano & Pruzan, Ltd.", "Nei, Carlos", "Pencil and watercolor on paper", "Perl, Erica", "Resortwear", "Staffs (Sticks, canes, etc.)", "Stipelman, Steven", "Underwear", "Valentino, 1932-", "Black and white phototransfer", "Cardin, Pierre, 1922-", "Chaillot, A.", "Creed, Charles, 1909-", "Croland, David", "Drian", "Grammer, June", "Halston Studio for Jane Derby", "Halston Studio for Kahan-Bill Smith", "Halston Studio for Teal Traina", "Kapp, Annaliese", "Klepper, Esther", "La Goűt du Jour", "La Mode Artistique", "La Mode Pratique: Journal de la Femme et de la Maison", "LeClere, Pierre-Thomas", "Lefranco", "Lingerie", "Lucy", "Molyneux, Edward Henry, 1891-1974", "Monarch Tailoring Co.", "Mooring, Mark", "Muray, Nickolas, 1892-1965", "Papinoff", "Parker, Bob", "Printed paper", "Purnell, Catherine", "Sandoz, Emile-Auguste, 1901-1964", "Schatt, Roy", "Shorts", "Siméon, Fernand, 1884-1928", "Tempera on printed paper", "Textiles on type-written paper", "Wax Pencils", "Wilson, Carl", "A.C.", "Acrylic", "Allen, Ted", "Allgemeine Moden-Zeitung", "American Fashion Review / Sartorial Art Journal", "American Gentleman and Sartorial Art Journal", "Apparel Arts", "Bakst, Léon, 1866-1924", "Belts", "Blau, Tom", "Blouses", "Bohan, Marc, 1926-", "Boutet de Monvel, Bernard", "Bow ties", "Cashin, Bonnie", "Charle, H.", "Cloaks", "Compte-Calix, François Claudius, 1813-1880", "De Casimacker", "Deferneville, P.", "Der Bazar", "Der Tage einer Dame", "Earley, Donald", "Eisenstaedt, Alfred", "Elia, Albert", "Elkus, Bruce", "English Women's Domestic Magazine", "Fox, Barbara", "Gallenga, Maria Monica", "Genio C. Scott", "Glax, Stephanie", "Gleason, Mary", "Glitter", "Gouache with acetate overlay", "Grangier, Jean", "Green, Norman", "Greenhill, Fred", "Guijol, A.", "H. Ch. [H. Charle]", "Hall, Arnold", "Halston Publicity", "Halston Studio Partos", "Halston Studio for Bill Smith", "Halston Studio for Jane Derby/Oscar Delarenta", "Halston Studio for Partos/Vogue", "Halston Studio for Revlon", "Halston Studio for Samuel R.", "Halston Studio for Sarmi", "Halston Studio for Utre", "Hannett, A.T.", "Hartnell, Norman", "Heliochrome", "Hosiery", "Howard, Jim", "Hurrell, George, 1904-1992", "Il Mondo Elegante", "Jno. J. Mitchell Co.", "Johnson, Doug", "L'Ami des Dames", "L'Art et la mode: Reproduction en noir et en couleurs de costumes, d'ameublements, de joyaux et de tous objets d'art servant de cadre ŕ l'el'egance et ŕ la beaut'e de la femme", "L'Illustrateur des Dames", "La Moda Cubana", "La Moda Elegante Illustrada", "La Moda Elegante llustrada", "La Mode Elegante Illustrada", "La Mode: Revue des Modes, Galerie des Moeurs, Album des Salons", "Lachasse, Ltd.", "Le Follet: journal du Grand Monde, Fashion, Polite Literature, Beaux Arts, etc.", "Le Moniteur de la Mode", "Le Salon de la Mode", "Leloir, Héloďse Colin, 1820-1873", "Les Choses de Paul Poiret Vues par Georges Lepape", "Les Robes de Paul Poiret / Racontées par Paul Iribe", "Lickona, Cheryl", "Lloyd, Gene", "Magasin des Demoiselles", "Mark, Mona", "Marker on paper", "Marty, A.-E. (André-Edouard), 1882-1974", "Mathieu, Dora", "Morrow, Tom, -1994", "Moutet, C.", "Obi", "Paquin, Jeanne, 1869-1936", "Peterson's Magazine", "Petit Courrier des Dames", "Phillip Sills & Co.", "Photocopies", "Photograph and collage", "Phototypie", "Raincoats", "Rozerwriski, Alex", "Ruegg", "Scott's Fashions", "Silkscreen", "Socks", "Souchet, A.", "Sunshine, Bob", "Tempera", "Textile on printed paper", "Toudouze, Anaďs Colin, 1822-1899", "Venet, Philippe", "Vests", "Zou Zou"];
    $( "#query" ).autocomplete({
      source: availableTags
    });
  } );
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
