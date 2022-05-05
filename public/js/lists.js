function edit_list(key) {

    let input = document.querySelectorAll('#form-list-title');
    let title = document.querySelectorAll('#lists-title');

    title[key].classList.add('hidden');
    input[key].classList.remove('hidden');
}

function edit_card(key) {

    let array_input = Array.from(document.querySelectorAll('#form-card-title'));
    let array_title = Array.from(document.querySelectorAll('#card-title'));

    const input = array_input.find(element => element.getAttribute('data-key') == key)
    const title = array_title.find(element => element.getAttribute('data-key') == key)

    input.classList.remove('hidden');
    title.classList.add('hidden');
}

function lists_create() {

    let title_query = document.getElementById('list-new');

    title_query.classList.remove('hidden');
}


function cards_create(key){
    let new_card = document.querySelectorAll('#new-card');

    new_card[key].classList.remove('hidden');

}

function card_user() {

    let input = document.getElementById('user-id-form');
    let title = document.getElementById('user-id-title');

    title.classList.add('hidden');
    input.classList.remove('hidden');
}

function change_content() {

    let newContent = document.getElementById('new_content');
    let current = document.getElementById('current_content');
    let form = document.getElementById('form-content');

    newContent.classList.add('hidden');
    current.classList.add('hidden');
    form.classList.remove('hidden');

}

function change_content2() {
    let current = document.getElementById('current_content');
    let form = document.getElementById('form-content');

    current.classList.add('hidden');
    form.classList.remove('hidden');
}


function change_title() {
    let current = document.getElementById('title_current');
    let form = document.getElementById('form_title');

    current.classList.add('hidden');
    form.classList.remove('hidden');
}


function change_img() {
  let form = Array.from(document.querySelectorAll('#form-img'));
  console.log(form);
  let icon = document.getElementById('icon-img');

  console.log(form[0]);
  console.log(form[1]);
  icon.classList.add('hidden');
  form[0].classList.remove('hidden');
  form[1].classList.remove('hidden');

}

/*********************************************************************** */

function show_options() {
  let button = document.getElementById('cardDropdown');
  let menu = document.getElementById('cardMenuDropdown');

  menu.classList.toggle('show');
}