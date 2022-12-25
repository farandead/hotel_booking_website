let heading = document.querySelector(".main-welcome-heading");
var orders = document.getElementById("main-orders-window-1");
var customers = document.querySelector(".main-customer-window")
var products = document.querySelector(".main-product-window")
var add_products = document.querySelector(".main-add-products-window")
var remove_products = document.querySelector(".remove-product-window")

var number = 100;

function changeToOrders(){
    var orders = document.querySelector(".main-orders-window");
    var heading = document.querySelector(".main-welcome-heading");
    var customers = document.querySelector(".main-customer-window")
    var products = document.querySelector(".main-product-window")
    var add_products = document.querySelector(".main-add-products-window")
    var remove_products = document.querySelector(".remove-product-window")

    heading.style.display = "none"
    orders.style.display = "block";
    customers.style.display = "none";
    products.style.display = "none";
    add_products.style.display = "none";
    remove_products.style.display = "none";
    

  

    

    
}

function changeToCustomers(){
    var orders = document.querySelector(".main-orders-window");
    var heading = document.querySelector(".main-welcome-heading");
    var customers = document.querySelector(".main-customer-window")
    var products = document.querySelector(".main-product-window")
    var add_products = document.querySelector(".main-add-products-window")
    var remove_products = document.querySelector(".remove-product-window")

    heading.style.display = "none"
    orders.style.display = "none";
    customers.style.display = "block";
    products.style.display = "none";
    add_products.style.display = "none";
    remove_products.style.display = "none";

}

function changeToProducts(){
    var orders = document.querySelector(".main-orders-window");
    var heading = document.querySelector(".main-welcome-heading");
    var customers = document.querySelector(".main-customer-window")
    var products = document.querySelector(".main-product-window")
    var add_products = document.querySelector(".main-add-products-window")
    var remove_products = document.querySelector(".remove-product-window")

    heading.style.display = "none"
    orders.style.display = "none";
    customers.style.display = "none";
    products.style.display = "block";
    add_products.style.display = "none";
    remove_products.style.display = "none";

}

function changeToAddProducts(){
    var orders = document.querySelector(".main-orders-window");
    var heading = document.querySelector(".main-welcome-heading");
    var customers = document.querySelector(".main-customer-window")
    var products = document.querySelector(".main-product-window")
    var add_products = document.querySelector(".main-add-products-window")
    var remove_products = document.querySelector(".remove-product-window")

    heading.style.display = "none"
    orders.style.display = "none";
    customers.style.display = "none";
    products.style.display = "none";
    add_products.style.display = "block";
    remove_products.style.display = "none";
    
}

function changeToRemovProducts(){
    var orders = document.querySelector(".main-orders-window");
    var heading = document.querySelector(".main-welcome-heading");
    var customers = document.querySelector(".main-customer-window")
    var products = document.querySelector(".main-product-window")
    var add_products = document.querySelector(".main-add-products-window")
    var remove_products = document.querySelector(".remove-product-window")

    heading.style.display = "none"
    orders.style.display = "none";
    customers.style.display = "none";
    products.style.display = "none";
    add_products.style.display = "none";
    remove_products.style.display = "block";

}