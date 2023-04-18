const label = document.getElementById("label");
const formSelector = document.getElementById("form-selector");
const nextButton = document.getElementById("next-button");
const backButton = document.getElementById("back-button");
const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");
const form3 = document.getElementById("form3");
const form4 = document.getElementById("form4");
const form5 = document.getElementById("form5");
const form6 = document.getElementById("form6");
const form7 = document.getElementById("form7");
let selectedOptionIndex = 0;

formSelector.addEventListener("change", (event) => {
  if (event.target.selectedIndex > 0) {
    nextButton.classList.remove("hidden");
    nextButton.disabled = false;
  } else {
    nextButton.classList.add("hidden");
    nextButton.disabled = true;
  }
});

nextButton.addEventListener("click", (event) => {
  event.preventDefault();
  if (formSelector.value !== "none") {
    selectedOptionIndex = formSelector.selectedIndex;
    if (formSelector.value === "form1") {
      form1.classList.remove("hidden");
      form2.classList.add("hidden");
      form3.classList.add("hidden");
      form4.classList.add("hidden");
      form5.classList.add("hidden");
      form6.classList.add("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form2") {
      form1.classList.add("hidden");
      form2.classList.remove("hidden");
      form3.classList.add("hidden");
      form4.classList.add("hidden");
      form5.classList.add("hidden");
      form6.classList.add("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form3") {
      form1.classList.add("hidden");
      form2.classList.add("hidden");
      form3.classList.remove("hidden");
      form4.classList.add("hidden");
      form5.classList.add("hidden");
      form6.classList.add("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form4") {
      form1.classList.add("hidden");
      form2.classList.add("hidden");
      form3.classList.add("hidden");
      form4.classList.remove("hidden");
      form5.classList.add("hidden");
      form6.classList.add("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form5") {
      form1.classList.add("hidden");
      form2.classList.add("hidden");
      form3.classList.add("hidden");
      form4.classList.add("hidden");
      form5.classList.remove("hidden");
      form6.classList.add("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form6") {
      form1.classList.add("hidden");
      form2.classList.add("hidden");
      form3.classList.add("hidden");
      form4.classList.add("hidden");
      form5.classList.add("hidden");
      form6.classList.remove("hidden");
      form7.classList.add("hidden");
    } else if (formSelector.value === "form7") {
      form1.classList.add("hidden");
      form2.classList.add("hidden");
      form3.classList.add("hidden");
      form4.classList.add("hidden");
      form5.classList.add("hidden");
      form6.classList.add("hidden");
      form7.classList.remove("hidden");
    }
    backButton.classList.remove("hidden");
    formSelector.hidden = true;
    label.hidden = true;
    nextButton.classList.add("hidden");
  }
});

backButton.addEventListener("click", (event) => {
  event.preventDefault();
  form1.classList.add("hidden");
  form2.classList.add("hidden");
  form3.classList.add("hidden");
  form4.classList.add("hidden");
  form5.classList.add("hidden");
  form6.classList.add("hidden");
  form7.classList.add("hidden");

  backButton.classList.add("hidden");
  formSelector.hidden = false;
  label.hidden = false;
  formSelector.selectedIndex = selectedOptionIndex;
  nextButton.classList.remove("hidden");
  nextButton.disabled = false;
});

function previewBeforeUpload(id) {
  document.querySelector("#" + id).addEventListener("change", function (e) {
    if (e.target.files.length == 0) {
      return;
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    // document.querySelector("#" + id + "-preview div").innerText = file.name;
    document.querySelector("#" + id + "-preview img").src = url;
  });
}

previewBeforeUpload("file-1");
previewBeforeUpload("file-2");
previewBeforeUpload("file-3");

previewBeforeUpload("file-4");
previewBeforeUpload("file-5");
previewBeforeUpload("file-6");

previewBeforeUpload("file-7");
previewBeforeUpload("file-8");
previewBeforeUpload("file-9");

previewBeforeUpload("file-10");
previewBeforeUpload("file-11");
previewBeforeUpload("file-12");

previewBeforeUpload("file-13");
previewBeforeUpload("file-14");
previewBeforeUpload("file-15");

previewBeforeUpload("file-16");
previewBeforeUpload("file-17");
previewBeforeUpload("file-18");

previewBeforeUpload("file-19");
previewBeforeUpload("file-20");
previewBeforeUpload("file-21");
