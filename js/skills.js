const skillsLeft = [
  { name: "HTML/CSS", score: 95 },
  { name: "Javascript", score: 90 },
  { name: "PHP/Laravel", score: 70 },
  { name: "NodeJS", score: 70 },
  { name: "ReactJS", score: 75 },
  { name: "GatsbyJS", score: 80 },
  { name: "TailwindCSS", score: 90 },
  { name: "Bootstrap", score: 90 },
  { name: "Material UI", score: 60 },
]

const skillsRight = [
  { name: "Git", score: 80 },
  { name: "Docker", score: 70 },
  { name: "C/C++", score: 75 },
  { name: "Python", score: 70 },
  { name: "Java", score: 70 },
  { name: "SQL", score: 65 },
  { name: "Haskell", score: 40 },
  { name: "Flutter", score: 25 },
]

const columns = document.getElementById("skills").querySelectorAll(".col-lg-6")

function createElementFromHTML(htmlString) {
  var div = document.createElement('div');
  div.innerHTML = htmlString.trim();
  return div.firstChild;
}

function component(name, score) {
  return createElementFromHTML(
    `<div class="progress">
      <span class="skill">${name}<i class="val">${score}%</i></span>
      <div class="progress-bar-wrap">
        <div class="progress-bar" role="progressbar" aria-valuenow="${score}" aria-valuemin="0" aria-valuemax="100">
        </div>
      </div>
    </div>`
  )
}

skillsLeft.map(item => {
  columns[0].append(component(item.name, item.score))
})

skillsRight.map(item => {
  columns[1].append(component(item.name, item.score))
})
