

// Search field suggestions...

let names = [

    'How to stay safe online',
    'How can I secure my device',
    'How can I protect from phishing',
    'Phishing',
    'Two Factor',
    'Update',
    'How to update software',
    'Personal Information',
    'How to secure email',
    'Tracking',
    'Privacy setting',
    'What is phishing',
    'Complex passowrd',
    'Security tips',
    'Whatsapp',
    'YouTube',
    'LinkedIn',
    'Pinterest',

    'aims & visions',
    'how to protect from cyberbullying',
    'Digital Guardians',
    'Think before You Post',
    'Goal to give teenagers',
    'Online kindness',
    'Our Goal',
    'How we fight online harassment',
    'what is digital realm',
    
    'what is the most import of social media use',
    'Tell me about most secure social media app' ,
    'What is botnet attack ?',
    'Online database search',
    'Deep depth of social media apps',

    'How parents can help their children about social media',
    'parental control tips',
    'Commnuication and Euducation',
    'Setting boundaries and monitoring',
    'seeking support',
    'What is parental control',
    'How parents can take care ',


    'live streaming',
    'Enusre to safe live streaming',
    'Comments & Reactions',
    'Our aim for live streaming safety',
    'Facebook live',
    'Broadcasting',
    'Live streaming tips',
    'How can I stay safe when live streaming',
    'How to resist toxic beheavior',
    'Live streaming privacy setting',
    'Secure atmosphere in live streaming',

    'Legislation',
    'Legal',
    'How to comply laws of social media',
    'Laws: important to know about',
    'guidance for legislation',
    'GDPR, EU regulation',
    'Best Practise Guidance',
    'Critical thinking to prevnet false infos',
    'Digital well beings',

    'Our Team Members',
    'Developers',
    'Team',

    'Our Location',
    'About Us'


];


let sortedNames = names.sort();


let sort_input = document.querySelector("#sort_input");


sort_input.addEventListener("keyup", (e) => {
  removeElements();

  for (let i of sortedNames) {

    if (
      i.toLocaleLowerCase().startsWith(sort_input.value.toLowerCase()) &&
      sort_input.value != ""
    ) {

      let listItem = document.createElement("li");

      listItem.classList.add("list-items");
      listItem.style.cursor = "pointer";
      listItem.setAttribute("onclick", "displayNames('" + i + "')");


      let suggest_word = "<b>" + i.slice(0, sort_input.value.length) + "</b>";
      suggest_word += i.slice(sort_input.value.length);


      listItem.innerHTML = suggest_word;
      document.querySelector(".s_list").appendChild(listItem);
    }
  }
});

document.body.addEventListener("click", () => {
  removeElements();
});

function displayNames(value) {
  sort_input.value = value;
  removeElements();

    sort_input.focus();
}

function removeElements() {
  let items = document.querySelectorAll(".list-items");
  items.forEach((item) => {
    item.remove();
  });
}
