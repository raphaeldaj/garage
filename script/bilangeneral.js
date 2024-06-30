const addactive = document.getElementById('add-active');
const add = document.getElementById('add');
const addauto = document.getElementById('add-auto');
const addempl = document.getElementById('add-empl');
const addautoform = document.getElementById('add-auto-form');
const addemplform = document.getElementById('add-empl-form');




// add.classList.add('add-active-off');
// addauto.classList.add('desapear');
// addempl.classList.add('despear');
// addautoform.classList.toggle('add-auto-off');
// addemplform.classList.toggle('add-auto-off');
let first_time_add = false;

addactive.addEventListener('click',function(){
  add.classList.toggle('add-active-on');
  addauto.classList.toggle('apear');
  addempl.classList.toggle('apear');
  if( first_time_add ){
    add.classList.toggle('add-active-off');
    addauto.classList.toggle('desapear');
    addempl.classList.toggle('despear');
  }else{
    first_time_add = true ;
  }
})

let first_time_auto = false;
let on_screen_auto = false;
let on_screen_auto_count = 0;


addauto.addEventListener('click',function(){
  addautoform.classList.toggle('add-auto-on');
  
  if( first_time_auto ){
    addautoform.classList.toggle('add-auto-off');
  }else{
    first_time_auto = true ;
  }
  

  ++on_screen_auto_count;


  if( (on_screen_empl_count % 2) == 1 )
  {
    addemplform.classList.toggle('add-auto-on');
    addemplform.classList.toggle('add-auto-off');
    ++on_screen_empl_count;
  }
})

let first_time_empl = false;
let on_screen_empl = false;
let on_screen_empl_count = 0;

addempl.addEventListener('click',function(){
  addemplform.classList.toggle('add-auto-on');
  
  if( first_time_empl ){
    addemplform.classList.toggle('add-auto-off');
  }else{
    first_time_empl = true ;
  }


  ++on_screen_empl_count;


  if( (on_screen_auto_count % 2) == 1 )
  {
    addautoform.classList.toggle('add-auto-on');
    addautoform.classList.toggle('add-auto-off');
    ++on_screen_auto_count;
  }
})