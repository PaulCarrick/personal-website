function setFieldValue(elementId, value) {
    const field = document.getElementById(elementId);

    if (field)
        field.value = value;
}

function includeFile(elementId, filename) {
    fetch(filename)
        .then(response => response.text())
        .then(data => document.getElementById(elementId).innerHTML = data)
        .catch(error => console.error('Error loading file:', error));
}

setFieldValue('javascript_available', value);
includeFile('page_header', 'header.html');
includeFile('page_footer', 'footer.html');
