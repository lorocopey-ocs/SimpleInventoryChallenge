function showAddInput(){
    //try to hide inputs
    hideSearchInput();
    hideDeleteInput();

    const addInput = document.getElementById("add-input");
    addInput.style.display = "";
}

function hideAddInput(){
    const addInput = document.getElementById("add-input");
    addInput.style.display = "none";
}

function showSearchInput(){
    //try to hide add inputs
    hideAddInput();
    hideDeleteInput();

    const addInput = document.getElementById("search-product");
    addInput.style.display = "";
}

function hideSearchInput(){
    const addInput = document.getElementById("search-product");
    addInput.style.display = "none";
}

function showDeleteInput(){
    //try to hide add inputs
    hideAddInput();
    hideSearchInput();

    const addInput = document.getElementById("delete-product");
    addInput.style.display = "";
}

function hideDeleteInput(){
    const addInput = document.getElementById("delete-product");
    addInput.style.display = "none";
}

async function createNewProduct(){

    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    const productNameInput = document.getElementById("productName");
    const productName = productNameInput.value;

    const productPriceInput = document.getElementById("price");
    const productPrice = productPriceInput.value;

    const productQuantityInput = document.getElementById("quantity");
    const productQuantity = productQuantityInput.value;

    let payload = {
        'name':productName,
        'price':productPrice,
        'quantity':productQuantity
    };

    const requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: JSON.stringify(payload),
        redirect: "follow"
    }
    
    const response = await fetch("http://localhost:8080/index.php/product/add-products", requestOptions);
    const jsonData = await response.json();

    //cleaning inputs
    productNameInput.value = "";
    productPriceInput.value = "";
    productQuantityInput.value = "";

    await getAllProducts();
    return jsonData;
}


async function getData() {
    const requestOptions = {
      method: "GET",
      redirect: "follow"
    };
  
    const response = await fetch("http://localhost:8080/index.php/product/get-products", requestOptions);
    const jsonData = await response.json();
    return jsonData;
}

async function searchProduct(){
    const requestOptions = {
        method: "GET",
        redirect: "follow"
      };
    
    const searchProductNameInput = document.getElementById("searchProductName");
    const searchProductName = searchProductNameInput.value;

    const response = await fetch("http://localhost:8080/index.php/product/get-products?productName="+searchProductName, requestOptions);
    const jsonData = await response.json();
    createTable(jsonData);
}

function cleanDiv() {
    const divElement = document.getElementById("list-all");
    while (divElement.firstChild) {
      divElement.removeChild(divElement.firstChild);
    }
}

async function getAllProducts(){
    const data = await getData();
    createTable(data);
}

async function deleteItem(item){

    const requestOptions = {
        method: "DELETE",
        redirect: "follow"
    };

    //try to clean search in order to avoid bugs
    const searchInput = document.getElementById("searchProductName");
    searchInput.value = "";
    
    const response = await fetch("http://localhost:8080/index.php/product/delete-product/"+item.id, requestOptions);
    const jsonData = await response.json();
    const deleteNotification = document.getElementById('delete-notification');
    deleteNotification.style.display = "";
    setTimeout(() => { deleteNotification.style.display = "none";}, 2500);
    await getAllProducts();
    return jsonData;
}

function createTable(data) {
    cleanDiv();
  
    if (data.length === 0) {
      const divElement = document.getElementById("list-all");
      divElement.append('No Data to display');
      return;
    }
  
    const table = document.createElement("table");
    table.classList.add("mi-tabla");
  
    const tableHeader = document.createElement("thead");
    tableHeader.innerHTML = `
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Action</th>  </tr>
    `;
  
    const tableBody = document.createElement("tbody");
    for (const item of data) {
      const tableRow = document.createElement("tr");
  
      // Create the button element
      const button = document.createElement("button");
      button.textContent = "Delete";  // Set button text (you can customize this)
      button.id = item.id;  // Set button ID to the item's ID
  
      // Add the button to a table cell
      const buttonCell = document.createElement("td");
      buttonCell.appendChild(button);
      button.addEventListener('click', () => deleteItem(item));
  
      // Build the table row content including the button cell
      tableRow.innerHTML = `
        <td>${item.id}</td>
        <td>${item.name}</td>
        <td>${item.price}</td>
        <td>${item.quantity}</td>
        `;
      tableRow.appendChild(buttonCell);  // Append the button cell to the row
  
      tableBody.appendChild(tableRow);
    }
  
    table.appendChild(tableHeader);
    table.appendChild(tableBody);
  
    const divElement = document.getElementById("list-all");
    divElement.appendChild(table);
}
  
