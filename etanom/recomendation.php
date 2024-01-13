<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crop Recommendation System</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
    }

    nav {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: left;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 15px;
    }

    #recommendation-container {
      text-align: center;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      max-width: 900px;
      margin: auto;
      margin-top: 20px;
    }

    h1 {
      color: #333;
      font-weight: bold;
      text-align: center;
      

    }

    label {
      display: block;
      margin: 10px 0;
      font-weight: bold;
      text-align: left;
    }

    select {
      padding: 15px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
      font-size: 15px;

    }

    button {
      padding: 10px;
      margin-top: 15px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 40%;
      box-sizing: border-box;
    }

    button:hover {
      background-color: #45a049;
    }

    #result {
      margin-top: 20px;
      color: #555;
    }

    .message-box {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      z-index: 999;
      max-width: 550px;
      width: 100%;
      margin: auto;
      text-align: justify;
    }

    .message-box h2 {
      color: #333;
      margin-bottom: 15px;
    }

    .message-box button {
      margin-top: 10px;
      display: inline-block;
      width: calc(50% - 5px); /* Adjust margin between buttons */
      box-sizing: border-box;
    }
  </style>
</head>
<body>

<nav>
  <a href="http://localhost/final/etanom/">Etanom</a>
  <a href="recomendation.php">Recomendation</a>
  <a href="http://localhost/final/etanom/php-sqlite-forum/">Community</a>
</nav>

<div id="recommendation-container">
  <h1>Crop Recommendation System</h1>

  <label for="crop">Select Crop:</label>
  <select id="crop">
    <option value="taro">Taro (Gabi)</option>
    <option value="malabar spinach">Malabar Spinach (Alugbati)</option>
    <option value="onions">Onions (Sibuyas)</option>
    <option value="garlic">Garlic (Bawang)</option>
    <option value="chives">Chives (Kutsay)</option>
    <option value="broccoli">Broccoli (Brokuli)</option>
    <option value="cauliflower">Cauliflower(Koliplor)</option>
    <option value="cabbage">Cabbage(Repolyo)</option>
    <option value="pechay">Pechay(Bok choy)</option>
    <option value="mustard green">Mustard Green (Mustasa)</option>
    <option value="water spinach">Water Spinach (Kangkong)</option>
    <option value="spinach">Spinach (Espinaka)</option>
    <option value="radish">Radish (Labanos)</option>
    <option value="lettuce">Lettuce(Litsugas)</option>
    <option value="chayote">Chayote(Syote)</option>
    <option value="sponge gourd">Sponge Gourd (Patola)</option>
    <option value="bitter gourd">Bitter Gourd (Ampalaya)</option>
    <option value="bottle gourd">Bottle Gourd (Upo)</option>
    <option value="squash">Squash (Kalabasa)</option>
    <option value="winter melon">Winter Melon (Kundol)</option>
    <option value="ginger">Ginger (Luya)</option>
    <option value="corn">Corn (Mais)</option>
    <option value="lemon grass">Lemon Grass (Tangland)</option>
    <option value="string beans">String Beans (Sitaw)</option>
    <option value="winged beans">Winged Beans (Sigarilyas)</option>
    <option value="peanut">Peanut (Mani)</option>
    <option value="mungbeans">Mungbeans (Mungo)</option>
    <option value="lima beans">Lima Beans (Patani)</option>
    <option value="hyacinth beans">Hyacinth Beans (Bataw)</option>
    <option value="lady finger">Lady Finger (Okra)</option>
    <option value="nalta jute">Nalta Jute (Sluyot)</option>
    <option value="cassava">Cassava (Kamoteng Kahoy)</option>
    <option value="sweet potato">Sweet Potato (Kamote)</option>
    <option value="eggplant">Eggplant (Talong)</option>
    <option value="tomato">Tomato(Kamatis)</option>
    <option value="bell peppers">Bell Peaper (Siling-pula)</option>
    <option value="chili">Chili (Sili)</option>
    <option value="potato">Potato (Patatas)</option>
    <option value="carrot">Carrot (Karot)</option>
    <option value="celery">Celery(Kintsay)</option>
    <option value="celery">Cucumber (Pipino)</option>
    <option value="celery">Snap Beans (Abitsuwela)</option>
  

   
  </select>

  <label for="season">Select Season:</label>
  <select id="season">
    <option value="dry">Dry Season (Tag-init)</option>
    <option value="wet">Wet Season (Tag-ulan)</option>
  </select>

  <button onclick="showRecommendation()">Get Recommendation</button>

  <div id="result"></div>

</div>

<!-- Message Box -->
<div id="messageBox" class="message-box">
  <h2>Recommendation</h2>
  <div id="recommendationContent"></div>
  <button id="proceedButton" style="display:none;" onclick="proceedToLink()">Proceed</button>
  <button id="backButton" onclick="closeMessageBox()">Back</button>
</div>

<script>
  function showRecommendation() {
    const selectedCrop = document.getElementById("crop").value;
    const selectedSeason = document.getElementById("season").value;
    const resultContainer = document.getElementById("result");
    const recommendationContent = document.getElementById("recommendationContent");
    const messageBox = document.getElementById("messageBox");
    const proceedButton = document.getElementById("proceedButton");
    const backButton = document.getElementById("backButton");

    // Simple logic for recommendation based on crop and season
    let recommendation = "";
    let link = "";
    if (selectedCrop === "broccoli" && selectedSeason === "wet") {
      recommendation = "Broccoli is a wet season vegetable that prefers cooler temperatures. Planting during the dry season helps prevent premature flowering (bolting), ensuring better quality and yield.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=23"; 
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "onions" && selectedSeason === "dry") {
      recommendation = "Onions are typically planted during the dry season because they favor well-drained soil. Planting during this time helps prevent waterlogging, which can lead to diseases and affect the quality of the bulbs.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=46";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "cabbage" && selectedSeason === "wet") {
      recommendation = "Cabbage is a cool-season vegetable. Planting during the dry season allows for optimal growth without the risk of bolting, ensuring better head formation.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=24";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "cauliflower" && selectedSeason === "wet") {
      recommendation = "Cauliflower, like broccoli, is a cool-season crop. Planting during the dry season helps prevent premature flowering, leading to better-quality curds.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=25";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "taro" && (selectedSeason === "wet")) {
      recommendation = "In places where there is a distinct wet and dry season, planting is done shortly before the start of rainy season.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=50";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "malabar spinach" && (selectedSeason === "wet")) {
      recommendation = "The best time for planting is at the end of the rainy season. Alugbati is propagated through seeds and cutting 20 to 25 cm long. In using cuttings, the leaves are usually removed before planting so as to reduce water loss through transpiration.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=52";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "garlic" && (selectedSeason === "dry")) {
      recommendation = "Garlic planting season in the Philippines is usually from September to November1. However, garlic grows best during the dry season, which typically starts from November until early May2. Garlic is usually planted during the months of October to December and harvested in the months of January to April ";
      link = "http://localhost/final/etanom/?page=view_crops&rid=47";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "pechay" && (selectedSeason === "dry")) {
      recommendation = "Pechay can be cultivated in both dry and wet seasons. However, during the dry season, it is essential to provide sufficient moisture to prevent premature flowering (bolting) and promote leaf development. ";
      link = "http://localhost/final/etanom/?page=view_crops&rid=6";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "mustard green" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "Mustard greens can be grown in both seasons but may benefit from partial shade during the hotter dry season to prevent bolting and maintain better taste.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=40";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "water spinach" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "Water spinach can be grown throughout the year in the Philippines. It is well-suited for cultivation in warm and tropical climates.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=42";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "spinach" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "Spinach can be grown in both seasons but may benefit from partial shade during the hotter dry season to prevent bolting and maintain better taste.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=41";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "chives" && (selectedSeason === "wet")) {
      recommendation = "Chives thrive in the wet season in the Philippines due to the ample water supply, moderate temperatures, and absence of dormancy. The consistent moisture promotes rapid growth, and the warm tropical climate provides an ideal environment for continuous cultivation. ";
      link = "http://localhost/final/etanom/?page=view_crops&rid=48";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "radish" && (selectedSeason === "wet" )) {
      recommendation = "Radishes can be planted in both seasons, but they tend to develop faster in the cooler dry season, resulting in crisp and flavorful roots.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=43";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "chayote" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "Chayote can be cultivated in both seasons, but extra care is required during the dry season to provide sufficient water for proper fruit development.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=37";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "sponge gourd" && (selectedSeason === "wet")) {
      recommendation = "Sponge gourd thrives in the wet season when there is abundant water for robust vine growth and fruit development.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=38";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "bitter gourd" && (selectedSeason === "wet")) {
      recommendation = "Bitter gourd is well-suited for the wet season when there is ample water supply for vigorous vine growth and fruit development.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=5";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "bottle gourd" && (selectedSeason === "wet")) {
      recommendation = "Bottle gourd does well in the wet season, benefiting from ample water for vigorous vine growth and fruit development.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=20http://localhost/final/etanom/?page=view_crops&rid=20";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "squash" && (selectedSeason === "wet" || selectedSeason === "dry")) {
      recommendation = "The diverse climate of the Philippines, coupled with a variety of squash types and seasoned agricultural practices, allows Filipinos to grow squash throughout the year. Highland dryness favors dry season planting, while wet season rains are managed to support specific varieties in lowlands. This flexibility ensures a continuous supply of this beloved vegetable in every season.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=12";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "winter melon" && (selectedSeason === "Dry")) {
      recommendation = "Kundol thrives in the dry season, specifically from October to February in the Philippines. This period offers minimal rainfall, optimal temperatures, and longer daylight hours, all of which contribute to healthy growth, disease prevention, and bountiful harvests. While you might find kundol available year-round, the best quality and flavor come from crops planted during these dry months.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=39";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "ginger" && (selectedSeason === "wet")) {
      recommendation = "Ginger is often planted during the wet season when the soil is well-drained, and there is enough moisture for the development of the ginger rhizomes.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=54";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "corn" && (selectedSeason === "wet" || selectedSeason === "dry")) {
      recommendation = "May be planted anytime of the year. Best to plant from October to November during the dry season.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=30";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "lemon grass" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "Lemon grass prefers warm and moist conditions, making it suitable for both seasons, with a preference for the wet season.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=31";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "string beans" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "It is grown throughout the year but the best time to plant is from May to June for wet season planting and from October to November for dry season.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=19";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "winged beans" && (selectedSeason === "wet")) {
      recommendation = "Wet season (May to July): This traditional planting time aligns with consistent rainfall and warm temperatures suitable for growth. However, manage pests and diseases more closely during this period.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=44";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "peanut" && (selectedSeason === "wet" || selectedSeason === "dry")) {
      recommendation = "Peanuts can be grown throughout the year in the Philippines, as long as production inputs such as water are adequate";
      link = "http://localhost/final/etanom/?page=view_crops&rid=45";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "mungbeans" && (selectedSeason === "wet" || selectedSeason === "dry")) {
      recommendation = "Mung beans can be planted in the Philippines during the wet season (May-June), dry season (September-October), and late dry season (February-March). The ideal planting season for mung beans is early spring or late summer/early fall, when temperatures are consistently above 60 degrees Fahrenheit2. Mung bean plants also need full sunlight and well-drained soil23. The crop can be produced in just 65 to 72 days after planting.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=11";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "lima beans" && (selectedSeason === "wet")) {
      recommendation = "Lima beans are suitable for the wet season when there is sufficient moisture for germination, growth, and the development of large pods.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=53";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "hyacinth" && (selectedSeason === "wet")) {
      recommendation = "Hyacinth beans are suitable for the wet season when there is sufficient moisture for germination, growth, and the development of vibrant-colored pods.";
      link = "https://link-for-maize.com";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "lady finger" && (selectedSeason === "wet")) {
      recommendation = "Ladyfinger (okra) is suitable for the wet season when there is sufficient moisture for germination, growth, and the development of tender pods.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=14";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "nalta jute" && (selectedSeason === "wet")) {
      recommendation = "Nalta jute is suitable for the wet season when there is sufficient moisture for germination, growth, and the development of long and fibrous stems.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=34";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "cassava" && (selectedSeason === "wet")) {
      recommendation = "Planting cassava during the wet season ensures that the crop can develop its starchy roots without the risk of waterlogging, contributing to a higher yield and quality of tubers.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=32";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "sweet potato" && (selectedSeason === "wet")) {
      recommendation = "Similar to cassava, sweet potato is a resilient and adaptable crop that can be grown in both the dry and wet seasons. It is known for its drought tolerance, making it particularly suitable for cultivation in drier conditions. ";
      link = "http://localhost/final/etanom/?page=view_crops&rid=33";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "eggplant" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = " Eggplant thrives in warm weather and tolerates some rain. While it can technically grow throughout the year, the best yields are often seen during the dry season (November to April) with consistent sunshine and temperatures.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=4";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "tomato" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = " Tomatoes grow best in cooler climes, but they are adaptable and can still survive the heat of summer months. The best times to plant tomatoes in the Philippines are from September to January in hilly areas, and from November to February in lowland areas.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=21";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "bell peppers" && (selectedSeason === "dry")) {
      recommendation = " Bell peppers require consistent warmth and sunshine for optimal growth. They are sensitive to frost and heavy rain, making the dry season ideal.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=35";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "chili" && (selectedSeason === "dry" || selectedSeason === "wet")) {
      recommendation = "  Chili peppers are very adaptable and can grow in both the dry and rainy seasons. However, the hottest peppers mature best in the dry season with more concentrated sunshine.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=36";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "potato" && (selectedSeason === "wet")) {
      recommendation = " Potatoes prefer cooler temperatures and benefit from the shorter days of the rainy season. Planting in the highlands or at higher elevations provides the ideal climate.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=8";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "carrot" && (selectedSeason === "wet")) {
      recommendation = " Month of October up to February, Carrots are cool weather crop. So, it takes more water to grow. If you are providing proper water, it will grow soon.   ";
      link = "http://localhost/final/etanom/?page=view_crops&rid=26";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "celery" && (selectedSeason === "wet")) {
      recommendation = "Celery thrives in cool, moist conditions and shorter days. It can be quite challenging to grow in the tropical climate of the Philippines but may do well in higher elevations or with controlled environments like greenhouses.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=28";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else if (selectedCrop === "lettuce" && (selectedSeason === "wet")) {
      recommendation = " In the Philippines, lettuce can be planted in low elevations during November to December. The quality is best in high elevations (1000 m asl). The growing season for lettuce in the Philippines is from August to January.";
      link = "http://localhost/final/etanom/?page=view_crops&rid=49";
      // Show both buttons
      proceedButton.style.display = "inline-block";
      backButton.style.display = "inline-block";
    } else {
      recommendation = "Oops! The crops may not be right for this season. We should reconsider and adjust our farming plan.";
      // Show only the back button
      proceedButton.style.display = "none";
      backButton.style.display = "inline-block";
    }

    resultContainer.innerHTML = ""; // Clear any previous content
    recommendationContent.innerHTML = recommendation;

    // Store the link in a data attribute
    proceedButton.dataset.link = link;

    // Show the message box
    messageBox.style.display = "block";
  }

  function proceedToLink() {
    // Retrieve the link from the data attribute
    const link = document.getElementById("proceedButton").dataset.link;
    // Redirect to the stored link
    window.location.href = link;
  }

  function closeMessageBox() {
    // Close the message box
    document.getElementById("messageBox").style.display = "none";
  }
</script>

</body>
</html>
