const body = document.querySelector("body"),
		sidebar = body.querySelector(".sidebar"),
		toggle = body.querySelector(".toggle"),
		searchBtn = body.querySelector(".search-box"),
		modeSwitch = body.querySelector(".toggle-switch"),
		modeText = body.querySelector(".mode-text");

		toggle.addEventListener("click", () =>{
			sidebar.classList.toggle("close");
		});

		modeSwitch.addEventListener("click", () =>{
			body.classList.toggle("dark");
		});

		$(document).ready(function(){
					$("#myInput").on("keyup",function(){
						var value=$(this).val().toLowerCase();
						$("#myTable tr").filter(function(){
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > - 1)
						});
					});
				});