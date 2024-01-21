import React from "react";
import ReactDOM from "react-dom/client";
// import "@/styles/index.scss";
// import App from "./App";

import "./bootstrap";
import PurchaseForm from "./purchase/form";
import SalesForm from "./sales/form";
import PurchaseReturnForm from "./purchase/Return";
import SalesReturnForm from "./sales/Return";

console.log("loaded JS");

/** Purchase Form */
const purchaseForm = document.getElementById("inventory-form");
if (purchaseForm) {
  // Check if there is with a purchase id, if so, we are editing a purchase
  let component = <PurchaseForm />;
  if (purchaseForm.hasAttribute("data-purchase")) {
    const purchase = purchaseForm.getAttribute("data-purchase");
    component = <PurchaseForm purchase={JSON.parse(purchase)} />;
  }
  ReactDOM.createRoot(purchaseForm).render(component);
}
/** Sales Form */
const salesForm = document.getElementById("sales-form");
if (salesForm) {
  // Check if there is with a purchase id, if so, we are editing a purchase
  let component = <SalesForm />;
  if (salesForm.hasAttribute("data-sales")) {
    const sales = salesForm.getAttribute("data-sales");
    component = <SalesForm sales={JSON.parse(sales)} />;
  }
  ReactDOM.createRoot(salesForm).render(component);
}

// purchase return
const purchaseReturnForm = document.getElementById("purchases-return-form");
if (purchaseReturnForm) {
  // Check if there is with a purchase id, if so, we are editing a purchase
  let component = <PurchaseReturnForm />;
  if (purchaseReturnForm.hasAttribute("data-purchase")) {
    const purchase = purchaseReturnForm.getAttribute("data-purchase");
    component = <PurchaseReturnForm purchase={JSON.parse(purchase)} />;
  }
  ReactDOM.createRoot(purchaseReturnForm).render(component);
}
// sales return
const salesReturnForm = document.getElementById("sales-return-form");
if (salesReturnForm) {
  // Check if there is with a purchase id, if so, we are editing a purchase
  let component = <SalesReturnForm />;
  if (salesReturnForm.hasAttribute("data-sales")) {
    const sales = salesReturnForm.getAttribute("data-sales");
    component = <SalesReturnForm sales={JSON.parse(sales)} />;
  }
  ReactDOM.createRoot(salesReturnForm).render(component);
}