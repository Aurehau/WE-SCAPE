<div id="header">

<!---------------------------- Logo ---------------------------->

<div id="logoHeader">
  <a href="index.php"> <img src="img/Kaiserstuhl-Escape-v1.png" alt="logo wescape"> </img> </a>
</div>

<!---------------------------- Menu tout écran ---------------------------->

<div id="menuHeader">

  <!---------------------------- Menu écran large ---------------------------->

  <div id="menuHeaderLargeScreen">
    <?= $menu ?>
  </div>


  <!---------------------------- Icone Menu Hamburger ---------------------------->

  <div id="menuHeaderHamburgerPhone">
      <svg class="openMenu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFAE00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
  </div>

  <!---------------------------- Menu Téléphone ---------------------------->

  <div class="menuPhone apparition">
      <svg class="closeMenu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFAE00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      <?= $menu ?>
  </div>

</div>

  <!---------------------------- Drapeaux site multilingue ---------------------------->

<div id="langues">

  <div id="english"> 
      <svg width="20" height="20" viewBox="0 0 101 60" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="101" height="60" fill="url(#pattern0)"/>
        <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0_38_3" transform="matrix(0.00125 0 0 0.00210417 0 -0.005)"/>
            </pattern>
            <image id="image0_38_3" width="800" height="480" xlink:href="data:image/png;base64,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"/>
        </defs>
      </svg>                
  </div>

  <div id="francais">
      <svg width="20" height="20" viewBox="0 0 28 17" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="28" height="17" fill="url(#pattern1)"/>
        <defs>
            <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0_22_21" transform="matrix(0.0031296 0 0 0.00515464 -0.0320324 0)"/>
            </pattern>
            <image id="image0_22_21" width="340" height="194" xlink:href="data:image/png;base64,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"/>
        </defs>
      </svg>
  </div>

</div>

</div>