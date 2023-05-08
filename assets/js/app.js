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


if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


$(document).ready(function() {
	$('#table').DataTable({
			lengthChange: false,
			scrollX: true,
			pageLength: 15,
			columnDefs: [
		        { 'max-width': '10%', 'targets': 9 }
		    ],
			fixedColumns: { left: 0	, right: 1 },
		});
		addTableButtons();

});

$(document).ready(function() {
	$('#table_result').DataTable({
		lengthChange: false,
			scrollX: true,
			pageLength: 15,
			columnDefs: [
		        { 'max-width': '10%', 'targets': 9 }
		    ],
			fixedColumns: { left: 0	, right: 1 },
	});
	// addTableResultButtons();
});

function ResetTransaction() {
	document.getElementById("name").value = "";
    document.getElementById("s_num").value = "";
    document.getElementById("desc").value = "";
	document.getElementById("remarks").value = "";	
}


function addTableButtons() {
	var table = $('#table').DataTable();
 
	new $.fn.dataTable.Buttons( table, {
		buttons: [
				{
                extend: 'collection',
                text: 'Export',
				className: "btn app-btn-secondary",
				background: false,
                buttons: [  
					{ 	extend: "pdf",
					title: `Inventory Logs ${ new Date().toLocaleDateString().replace(/\//g, '-')}`,
					footer: false,
						orientation: 'landscape',
		   				pageSize: 'LEGAL',
						exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }						 
					},
					{ 	extend: "excel",
						title: `Inventory Logs${ new Date().toLocaleDateString()}`,
						footer: false,
						orientation: 'landscape',
		   				pageSize: 'LEGAL',
						exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }						 
					}, 
			] }
		] } 
	);
	 
	table.buttons( 0, null ).containers().appendTo( '#filterTopCriteria' );
}

// function addTableResultButtons() {
// 	var table = $('#table_result').DataTable();
 
// 	new $.fn.dataTable.Buttons( table, {
// 		buttons: [
// 				{
//                 extend: 'collection',
//                 text: 'Export',
// 				className: "btn app-btn-secondary",
// 				background: false,
//                 buttons: [  
// 					{ 	extend: "pdf",
// 						title: `${ new Date().toLocaleDateString()}`,
// 						footer: false,
// 						orientation: 'landscape',
// 		   				pageSize: 'LEGAL',
// 						exportOptions: {
// 						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }						 
// 					},
// 					{ 	extend: "excel",
// 						title: `${ new Date().toLocaleDateString()}`,
// 						footer: false,
// 						orientation: 'landscape',
// 		   				pageSize: 'LEGAL',
// 						exportOptions: {
// 						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] }						 
// 					}, 
// 			] }
// 		] } 
// 	);
// 	table.buttons( 0, null ).containers().appendTo( '#filterTopCriteria' );
// }