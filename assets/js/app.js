"use strict";

window.addEventListener("load", function() {
  var preloader = document.getElementById("preloader");
  preloader.classList.add('fade-out');
  setTimeout(function() {
      preloader.style.display = 'none';
  }, 300);
});

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll(".alert");
alertList.forEach(function (alert) {
  new bootstrap.Alert(alert);
});

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById("sidepanel-toggler");
const sidePanel = document.getElementById("app-sidepanel");
const sidePanelDrop = document.getElementById("sidepanel-drop");
const sidePanelClose = document.getElementById("sidepanel-close");

window.addEventListener("load", function () {
  responsiveSidePanel();
});

window.addEventListener("resize", function () {
  responsiveSidePanel();
});

function responsiveSidePanel() {
  let w = window.innerWidth;
  if (w >= 1200) {
    // if larger
    //console.log('larger');
    sidePanel.classList.remove("sidepanel-hidden");
    sidePanel.classList.add("sidepanel-visible");
  } else {
    // if smaller
    //console.log('smaller');
    sidePanel.classList.remove("sidepanel-visible");
    sidePanel.classList.add("sidepanel-hidden");
  }
}

sidePanelToggler.addEventListener("click", () => {
  if (sidePanel.classList.contains("sidepanel-visible")) {
    console.log("visible");
    sidePanel.classList.remove("sidepanel-visible");
    sidePanel.classList.add("sidepanel-hidden");
  } else {
    console.log("hidden");
    sidePanel.classList.remove("sidepanel-hidden");
    sidePanel.classList.add("sidepanel-visible");
  }
});

sidePanelClose.addEventListener("click", (e) => {
  e.preventDefault();
  sidePanelToggler.click();
});

sidePanelDrop.addEventListener("click", (e) => {
  sidePanelToggler.click();
});

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

$(document).ready(function () {
  var table = $("#table").DataTable({
    lengthChange: false,
    scrollX: true,
    pageLength: 15,
    columnDefs: [{ "max-width": "10%", targets: 9 }],
    fixedColumns: { left: 0, right: 1 },
    language: {
    paginate: {
        next: '&#8594;', // or '→'
        previous: '&#8592;' // or '←' 
      }
    }
  });

  new $.fn.dataTable.Buttons(table, {
    buttons: [
      {
        extend: "collection",
        text: "Export",
        className: "btn app-btn-secondary",
        background: false,
        buttons: [
          {
            extend: "pdf",
            title: `Inventory Records of ICT Equipment ${new Date()
              .toLocaleDateString()
              .replace(/\//g, "-")}`,
            footer: false,
            orientation: "landscape",
            pageSize: "LEGAL",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
          },
          {
            extend: "excel",
            title: `Inventory Records of ICT Equipment ${new Date().toLocaleDateString()}`,
            footer: false,
            orientation: "landscape",
            pageSize: "LEGAL",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
          },
        ],
      },
    ],
  });

  table.buttons(0, null).containers().appendTo("#filterTopCriteria");
});

$(document).ready(function () {
  var table = $("#result_table").DataTable({
    lengthChange: false,
    scrollX: true,
    pageLength: 15,
    columnDefs: [{ "max-width": "10%", targets: 9 }],
    fixedColumns: { left: 0, right: 1 },
    language: {
      paginate: {
          next: '&#8594;', // or '→'
          previous: '&#8592;' // or '←' 
        }
      }
  });

  new $.fn.dataTable.Buttons(table, {
    buttons: [
      {
        extend: "collection",
        text: "Export",
        className: "btn app-btn-secondary",
        background: false,
        buttons: [
          {
            extend: "pdf",
            title: `Inventory Records of ICT Equipment ${new Date()
              .toLocaleDateString()
              .replace(/\//g, "-")}`,
            footer: false,
            orientation: "landscape",
            pageSize: "LEGAL",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
          },
          {
            extend: "excel",
            title: `Inventory Records of ICT Equipment ${new Date().toLocaleDateString()}`,
            footer: false,
            orientation: "landscape",
            pageSize: "LEGAL",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            },
          },
        ],
      },
    ],
  });

  table.buttons(0, null).containers().appendTo("#filterTopCriteria");
});

function ResetTransaction() {
  document.getElementById("name").value = "";
  document.getElementById("s_num").value = "";
  document.getElementById("desc").value = "";
  document.getElementById("remarks").value = "";
}


function FilterDept() {
	$('#dept').change(function() {
		var dept_id = $(this).val();
		$.ajax({
			url: "/do-inventory/init/controllers/filter_process.php",
			method: "POST",
			data: {
				id: dept_id
			},
			dataType: 'json',
			success: function(response) {
				var options = '<option value="" selected>All Office/Unit</option>';
				for (var i = 0; i < response.length; i++) {
					options += '<option value="' + response[i].o_name + '">' +
						response[
							i].o_name + '</option>';
				}
				$('#office').html(options);
			}
		})
	});
}
function FilterDept2() {
	$('#dept').change(function() {
		var dept_id = $(this).val();
		$.ajax({
			url: "/do-inventory/init/controllers/filter_process.php",
			method: "POST",
			data: {
				id: dept_id
			},
			dataType: 'json',
			success: function(response) {
				var options = '<option value="" disabled>Select Office/Unit</option>';
				for (var i = 0; i < response.length; i++) {
					options += '<option value="' + response[i].o_name + '">' +
						response[
							i].o_name + '</option>';
				}
				$('#office').html(options);
			}
		})
	});
}