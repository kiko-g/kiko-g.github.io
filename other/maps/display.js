let maps = [];

fetch("database.json").
  then(response => response.json()).
  then(data => {
    for(let map in data.blackops1) {
      maps.push(data.blackops1[map]);
    }

    maps.forEach(item => {
      let img = new Image();
      img.src = item;
      img.setAttribute("class", "banner");
      document.getElementById("img-container").appendChild(img);
    });
  });