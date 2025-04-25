// Get the input element by its ID
const OrgArbName = document.getElementById("OrgArbName") ?? '';

if (OrgArbName.length > 0) {
    
// Add an input event listener to the input element
OrgArbName.addEventListener("input", function(event) {
    // Get the input value
    const inputValue = event.target.value;

    // Define a regular expression pattern for Arabic characters
    const arabicPattern = /[\u0600-\u06FF\s]/;

    // Check if the input contains only Arabic characters or spaces
    if (!arabicPattern.test(inputValue)) {
        // If not, clear the input value
        OrgArbName.value = "";
    }
});

}



function updateLocationId() {
    var selectElement = document.getElementById("LocName");
    var locationIdElement = document.getElementById("locationId");
    var selectedValue = selectElement.options[selectElement.selectedIndex].value;

    // You can implement your logic here to generate the Location ID based on the selected value
    // For this example, we'll use a simple incrementing number.

    var locationId = "LO-" + (selectElement.selectedIndex + 1).toString().padStart(3, '0');
    locationIdElement.textContent = locationId;
}


function updateDepartmentId() {
    var selectElement = document.getElementById("departName");
    var locationIdElement = document.getElementById("departId");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var departmentId = selectedOption.getAttribute("data-department-id");

    if (selectedValue !== "") {
        locationIdElement.textContent = departmentId;
    } else {
        locationIdElement.textContent = "";
    }
}

function updateCategoryId() {
    var selectElement = document.getElementById("CatName");
    var locationIdElement = document.getElementById("CatId");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var categoryId = selectedOption.getAttribute("data-category-id");

    if (selectedValue !== "") {
        locationIdElement.textContent = categoryId;
    } else {
        locationIdElement.textContent = "";
    }
}


function updateOwnerRoleId() {
    var selectElement = document.getElementById("OwnerRoleName");
    var locationIdElement = document.getElementById("OwnerRoleId");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var categoryId = selectedOption.getAttribute("owner-role-id");

    if (selectedValue !== "") {
        locationIdElement.textContent = categoryId;
    } else {
        locationIdElement.textContent = "";
    }
}


function updateOwnerDptId() {
    var selectElement = document.getElementById("OwnerRoleName");
    var locationIdElement = document.getElementById("OwnerRoleId");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var categoryId = selectedOption.getAttribute("owner-department-name");

    if (selectedValue !== "") {
        locationIdElement.textContent = categoryId;
    } else {
        locationIdElement.textContent = "";
    }
}






function updateClassId() {
    var classselectElement = document.getElementById("ClassName");
    var classIdElement = document.getElementById("ClassId");
    var selectedValue = classselectElement.options[classselectElement.selectedIndex].value;

    // You can implement your logic here to generate the Location ID based on the selected value
    // For this example, we'll use a simple incrementing number.

    var ClassId = "CLASS-" + (classselectElement.selectedIndex + 1).toString().padStart(3, '0');
    classIdElement.textContent = ClassId;
}

var expanded = false;

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}



