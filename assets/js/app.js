'use strict';

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll('.alert')
alertList.forEach(function (alert) {
  new bootstrap.Alert(alert)
});


/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById('sidepanel-toggler'); 
const sidePanel = document.getElementById('app-sidepanel');  
const sidePanelDrop = document.getElementById('sidepanel-drop'); 
const sidePanelClose = document.getElementById('sidepanel-close'); 

window.addEventListener('load', function(){
	responsiveSidePanel(); 
});

window.addEventListener('resize', function(){
	responsiveSidePanel(); 
});


function responsiveSidePanel() {
    let w = window.innerWidth;
	if(w >= 1200) {
	    // if larger 
	    //console.log('larger');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
		
	} else {
	    // if smaller
	    //console.log('smaller');
	    sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
	}
};

sidePanelToggler.addEventListener('click', () => {
	if (sidePanel.classList.contains('sidepanel-visible')) {
		console.log('visible');
		sidePanel.classList.remove('sidepanel-visible');
		sidePanel.classList.add('sidepanel-hidden');
		
	} else {
		console.log('hidden');
		sidePanel.classList.remove('sidepanel-hidden');
		sidePanel.classList.add('sidepanel-visible');
	}
});



sidePanelClose.addEventListener('click', (e) => {
	e.preventDefault();
	sidePanelToggler.click();
});

sidePanelDrop.addEventListener('click', (e) => {
	sidePanelToggler.click();
});







$(document).ready(function() {
	$('#list_std').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std2').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std3').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std4').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std5').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std6').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std7').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std8').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std9').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std10').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std11').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std12').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std13').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std14').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std15').DataTable({
		lengthChange: false,
		ordering: false
	});
});

$(document).ready(function() {
	$('#list_std16').DataTable({
		lengthChange: false,
		ordering: false
	});
});

function ResetTransaction() {
	document.getElementById("name").value = "";
    document.getElementById("s_num").value = "";
    document.getElementById("desc").value = "";
	document.getElementById("remarks").value = "";	
}