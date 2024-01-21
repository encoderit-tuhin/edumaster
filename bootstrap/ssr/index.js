import { jsx, jsxs } from "react/jsx-runtime";
import ReactDOM from "react-dom/client";
import axios from "axios";
import { useState } from "react";
import ReactHtmlParser from "react-html-parser";
import Select from "react-select";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
function PurchaseForm({ purchase }) {
  const suppliers = (window == null ? void 0 : window.suppliers) ?? [];
  console.log("suppliers", suppliers);
  const items = (window == null ? void 0 : window.items) ?? [];
  const removePurchaseItemFromListRoute = window == null ? void 0 : window.removePurchaseItemFromList;
  console.log("removePurchaseItemFromListRoute", removePurchaseItemFromListRoute);
  const [formData, setFormData] = useState({
    paidAmount: 0,
    price: 0,
    quantity: 0,
    total: 0,
    note: "",
    reference: "",
    item_id: 0
  });
  const [productIndex, setProductIndex] = useState(null);
  const [selectedItems, setSelectedItems] = useState((purchase == null ? void 0 : purchase.purchases_items) || []);
  console.log("purchase", purchase);
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };
  const handleAddItem = () => {
    if (formData.item_id && formData.price && formData.quantity) {
      const newItem = {
        item_id: formData.item_id,
        // item_id: purchase?.id,
        price: formData.price,
        quantity: formData.quantity,
        total: formData.price * formData.quantity
      };
      let itemAlreadyAdded = selectedItems.some(
        (obj) => parseInt(obj.id + "") === parseInt(newItem.item_id + "")
      );
      if (productIndex != null) {
        selectedItems[productIndex] = newItem;
      } else {
        if (itemAlreadyAdded) {
          alert("Item already exists");
          return;
        }
        setSelectedItems([...selectedItems, newItem]);
      }
      setProductIndex(null);
      setFormData({
        item_id: 0,
        price: 0,
        quantity: 0,
        total: 0
      });
    } else {
      console.log("Please fill out all fields.");
    }
  };
  const checkAlreadyAdded = (item) => {
    let itemAlreadyAdded = selectedItems.some(
      (obj) => parseInt(obj.item_id + "") === parseInt(item.id)
    );
    return itemAlreadyAdded;
  };
  const handleDeleteItem = (index, item) => {
    const updatedItems = [...selectedItems];
    updatedItems.splice(index, 1);
    setSelectedItems(updatedItems);
    if (item.id) {
      window.location.href = removePurchaseItemFromListRoute + "/" + item.id;
    }
  };
  const totalPayable = selectedItems.reduce(
    (total, item) => total + parseInt(item.total + "", 10),
    0
  );
  const handleFormSubmit = (e) => {
    e.preventDefault();
    if (!selectedItems.length) {
      alert("Please add at least one item.");
      return;
    }
    const form = e.target;
    form.submit();
  };
  return /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx("div", { className: "panel-body row", children: /* @__PURE__ */ jsxs(
    "form",
    {
      action: window == null ? void 0 : window.action_route,
      onSubmit: handleFormSubmit,
      method: "post",
      autoComplete: "off",
      className: "form-horizontal validate   ",
      encType: "multipart/form-data",
      children: [
        (purchase == null ? void 0 : purchase.id) && /* @__PURE__ */ jsx("input", { type: "hidden", name: "_method", value: "PATCH" }),
        ReactHtmlParser(window == null ? void 0 : window.csrf_field),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Purchase Form" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: " control-label", children: "Supplier Name" }),
              /* @__PURE__ */ jsx(
                Select,
                {
                  required: true,
                  name: "supplierOrCustomerId",
                  className: "col-12",
                  options: suppliers,
                  getOptionLabel: (data) => data.name,
                  getOptionValue: (data) => data.id + "",
                  value: !!(purchase == null ? void 0 : purchase.supplier) ? suppliers.filter(
                    (option) => {
                      var _a;
                      return option.id === ((_a = purchase == null ? void 0 : purchase.supplier) == null ? void 0 : _a.id);
                    }
                  ) : formData.id
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Item Name" }),
              /* @__PURE__ */ jsx(
                Select,
                {
                  options: items,
                  name: "item_id",
                  value: !!formData.item_id ? items.find((item) => item.id === formData.item_id) : null,
                  getOptionLabel: (data) => data.name,
                  getOptionValue: (data) => data.id + "",
                  onChange: (item) => {
                    checkAlreadyAdded(item) ? alert("Item already exists") : setFormData((prev) => {
                      return { ...prev, item_id: (item == null ? void 0 : item.id) || 0 };
                    });
                  }
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Price" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "number",
                  name: "price",
                  className: "form-control price-input",
                  placeholder: "price",
                  value: formData.price,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Quantity" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "number",
                  name: "quantity",
                  className: "form-control price-input",
                  placeholder: "quantity",
                  value: formData.quantity,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label" }),
              /* @__PURE__ */ jsx(
                "button",
                {
                  type: "button",
                  className: "btn btn-primary mt-4",
                  onClick: handleAddItem,
                  children: "Add"
                }
              )
            ] })
          ] })
        ] }) }),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Payment Information" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: " Paid Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  required: true,
                  type: "text",
                  className: "form-control",
                  value: formData.paidAmount,
                  id: "totalPaid",
                  name: "paidAmount",
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Payable Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  disabled: true,
                  className: "form-control",
                  name: "note",
                  value: totalPayable
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Note" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "note",
                  value: formData.note,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "References" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "reference",
                  value: formData.reference,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Purchase Date" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  disabled: true,
                  value: (purchase == null ? void 0 : purchase.trans_date) ? purchase.trans_date : (/* @__PURE__ */ new Date()).toLocaleDateString("en-GB")
                }
              )
            ] }),
            /* @__PURE__ */ jsx(
              "input",
              {
                type: "text",
                value: "purchases",
                hidden: true,
                name: "transactionType"
              }
            )
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs("div", { className: " ", children: [
          /* @__PURE__ */ jsxs("table", { className: "table table-bordered item-table", children: [
            /* @__PURE__ */ jsx("thead", { children: /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsx("th", { children: "Item" }),
              /* @__PURE__ */ jsx("th", { children: "Price" }),
              /* @__PURE__ */ jsx("th", { children: "Quantity" }),
              /* @__PURE__ */ jsx("th", { children: "Total" }),
              /* @__PURE__ */ jsx("th", { children: "Remove" })
            ] }) }),
            /* @__PURE__ */ jsx("tbody", { children: (selectedItems || []).map((item, index) => /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsxs("td", { children: [
                items.filter(
                  (filterItem) => filterItem.id == parseInt(item.item_id + "")
                ).map((filteredItem) => filteredItem.name),
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][item_id]`,
                    value: item.item_id
                  }
                ),
                item.id && /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][id]`,
                    value: item.id
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.price,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][price]`,
                    value: item.price
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.quantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][quantity]`,
                    value: item.quantity
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.total,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][total]`,
                    value: item.total
                  }
                )
              ] }),
              /* @__PURE__ */ jsx("td", { children: /* @__PURE__ */ jsx(
                "button",
                {
                  type: "button",
                  className: "btn btn-danger",
                  onClick: () => handleDeleteItem(index, item),
                  children: "Remove"
                }
              ) })
            ] }, index)) })
          ] }),
          " "
        ] }),
        /* @__PURE__ */ jsx("div", { className: "mt-2 p-3 text-right", children: /* @__PURE__ */ jsx("button", { type: "submit", className: "btn btn-primary mt-3 float-right", children: "Purchase" }) })
      ]
    }
  ) }) });
}
function SalesForm({ sales }) {
  const customers = (window == null ? void 0 : window.customers) ?? [];
  console.log("customers :>> ", customers);
  const items = (window == null ? void 0 : window.items) ?? [];
  const removeSalesItemFromList = window == null ? void 0 : window.removeSalesItemFromList;
  console.log("removeSalesItemFromList", removeSalesItemFromList);
  const [formData, setFormData] = useState({
    paidAmount: 0,
    price: 0,
    quantity: 0,
    total: 0,
    note: "",
    reference: "",
    item_id: 0
  });
  const [productIndex, setProductIndex] = useState(null);
  const [selectedItems, setSelectedItems] = useState((sales == null ? void 0 : sales.sales_items) || []);
  console.log("salesItem", sales);
  console.log("formData :>> ", formData);
  console.log("selectedItems :>> ", selectedItems);
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };
  const handleAddItem = () => {
    if (formData.item_id && formData.price && formData.quantity) {
      const newItem = {
        item_id: formData.item_id,
        // item_id: sales?.id,
        price: formData.price,
        quantity: formData.quantity,
        total: formData.price * formData.quantity
      };
      let itemAlreadyAdded = selectedItems.some(
        (obj) => parseInt(obj.id + "") === parseInt(newItem.item_id + "")
      );
      if (productIndex != null) {
        selectedItems[productIndex] = newItem;
      } else {
        if (itemAlreadyAdded) {
          alert("Item already exists");
          return;
        }
        setSelectedItems([...selectedItems, newItem]);
      }
      setProductIndex(null);
      setFormData({
        item_id: 0,
        price: 0,
        quantity: 0,
        total: 0
      });
    } else {
      console.log("Please fill out all fields.");
    }
  };
  const checkAlreadyAdded = (item) => {
    let itemAlreadyAdded = selectedItems.some(
      (obj) => parseInt(obj.item_id + "") === parseInt(item.id)
    );
    return itemAlreadyAdded;
  };
  const handleDeleteItem = (index, item) => {
    const updatedItems = [...selectedItems];
    updatedItems.splice(index, 1);
    setSelectedItems(updatedItems);
    if (item.id) {
      window.location.href = removeSalesItemFromList + "/" + item.id;
    }
  };
  const totalPayable = selectedItems.reduce(
    (total, item) => total + parseInt(item.total + "", 10),
    0
  );
  const handleFormSubmit = (e) => {
    e.preventDefault();
    if (!selectedItems.length) {
      alert("Please add at least one item.");
      return;
    }
    const form = e.target;
    form.submit();
  };
  return /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx("div", { className: "panel-body row", children: /* @__PURE__ */ jsxs(
    "form",
    {
      action: window == null ? void 0 : window.action_route,
      onSubmit: handleFormSubmit,
      method: "post",
      autoComplete: "off",
      className: "form-horizontal validate   ",
      encType: "multipart/form-data",
      children: [
        (sales == null ? void 0 : sales.id) && /* @__PURE__ */ jsx("input", { type: "hidden", name: "_method", value: "PATCH" }),
        ReactHtmlParser(window == null ? void 0 : window.csrf_field),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Sales Form" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: " control-label", children: "Customer Name" }),
              /* @__PURE__ */ jsx(
                Select,
                {
                  required: true,
                  name: "supplierOrCustomerId",
                  className: "col-12",
                  options: customers,
                  getOptionLabel: (data) => data.first_name,
                  getOptionValue: (data) => data.id + "",
                  value: !!(sales == null ? void 0 : sales.customer) ? customers.filter(
                    (option) => {
                      var _a;
                      return option.id === ((_a = sales == null ? void 0 : sales.customer) == null ? void 0 : _a.id);
                    }
                  ) : formData.id
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Item Name" }),
              /* @__PURE__ */ jsx(
                Select,
                {
                  options: items,
                  name: "item_id",
                  value: !!formData.item_id ? items.find((item) => item.id === formData.item_id) : null,
                  getOptionLabel: (data) => data.name,
                  getOptionValue: (data) => data.id + "",
                  onChange: (item) => {
                    checkAlreadyAdded(item) ? alert("Item already exists") : setFormData((prev) => {
                      return {
                        ...prev,
                        item_id: (item == null ? void 0 : item.id) || 0,
                        price: (item == null ? void 0 : item.price) || 0
                      };
                    });
                  }
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Price" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "number",
                  name: "price",
                  className: "form-control price-input",
                  placeholder: "price",
                  value: formData.price,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label", children: "Quantity" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "number",
                  name: "quantity",
                  className: "form-control price-input",
                  placeholder: "quantity",
                  value: formData.quantity,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: " col-sm-6", children: [
              /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label" }),
              /* @__PURE__ */ jsx(
                "button",
                {
                  type: "button",
                  className: "btn btn-primary mt-4",
                  onClick: handleAddItem,
                  children: "Add"
                }
              )
            ] })
          ] })
        ] }) }),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Payment Information" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: " Paid Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  required: true,
                  type: "text",
                  className: "form-control",
                  value: formData.paidAmount,
                  id: "totalPaid",
                  name: "paidAmount",
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Payable Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  disabled: true,
                  className: "form-control",
                  name: "note",
                  value: totalPayable
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Note" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "note",
                  value: formData.note,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "References" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "reference",
                  value: formData.reference,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Sales Date" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  disabled: true,
                  value: (sales == null ? void 0 : sales.trans_date) ? sales.trans_date : (/* @__PURE__ */ new Date()).toLocaleDateString("en-GB")
                }
              )
            ] }),
            /* @__PURE__ */ jsx(
              "input",
              {
                type: "text",
                value: "sales",
                hidden: true,
                name: "transactionType"
              }
            )
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs("div", { className: " ", children: [
          /* @__PURE__ */ jsxs("table", { className: "table table-bordered item-table", children: [
            /* @__PURE__ */ jsx("thead", { children: /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsx("th", { children: "Item" }),
              /* @__PURE__ */ jsx("th", { children: "Price" }),
              /* @__PURE__ */ jsx("th", { children: "Quantity" }),
              /* @__PURE__ */ jsx("th", { children: "Total" }),
              /* @__PURE__ */ jsx("th", { children: "Remove" })
            ] }) }),
            /* @__PURE__ */ jsx("tbody", { children: (selectedItems || []).map((item, index) => /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsxs("td", { children: [
                items.filter(
                  (filterItem) => filterItem.id == parseInt(item.item_id + "")
                ).map((filteredItem) => filteredItem.name),
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][item_id]`,
                    value: item.item_id
                  }
                ),
                item.id && /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][id]`,
                    value: item.id
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.price,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][price]`,
                    value: item.price
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.quantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][quantity]`,
                    value: item.quantity
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.total,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][total]`,
                    value: item.total
                  }
                )
              ] }),
              /* @__PURE__ */ jsx("td", { children: /* @__PURE__ */ jsx(
                "button",
                {
                  className: "btn btn-danger",
                  onClick: () => handleDeleteItem(index, item),
                  children: "Remove"
                }
              ) })
            ] }, index)) })
          ] }),
          " "
        ] }),
        /* @__PURE__ */ jsx("div", { className: "mt-2 p-3 text-right", children: /* @__PURE__ */ jsx("button", { type: "submit", className: "btn btn-primary mt-3 float-right", children: "sales" }) })
      ]
    }
  ) }) });
}
function PurchaseReturnForm({
  purchase
}) {
  const suppliers = (window == null ? void 0 : window.suppliers) ?? [];
  console.log("suppliers restu", suppliers);
  const items = (window == null ? void 0 : window.items) ?? [];
  const [formData, setFormData] = useState({
    paidAmount: 0,
    price: 0,
    quantity: 0,
    total: 0,
    note: "",
    reference: "",
    item_id: 0
  });
  useState(null);
  const [selectedItems, setSelectedItems] = useState((purchase == null ? void 0 : purchase.purchases_items) || []);
  console.log("purchase :>> ", purchase);
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };
  const totalPayable = selectedItems.reduce(
    (total, item) => total + parseInt(item.total + "", 10),
    0
  );
  const handleFormSubmit = (e) => {
    e.preventDefault();
    if (!selectedItems.length) {
      alert("Please add at least one item.");
      return;
    }
    const form = e.target;
    form.submit();
  };
  return /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx("div", { className: "panel-body row", children: /* @__PURE__ */ jsxs(
    "form",
    {
      action: window == null ? void 0 : window.action_route,
      onSubmit: handleFormSubmit,
      method: "post",
      autoComplete: "off",
      className: "form-horizontal validate   ",
      encType: "multipart/form-data",
      children: [
        ReactHtmlParser(window == null ? void 0 : window.csrf_field),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Purchase Return Form" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: " control-label", children: "Supplier Name" }),
              /* @__PURE__ */ jsx(
                Select,
                {
                  name: "supplierOrCustomerId",
                  className: "col-12",
                  options: suppliers,
                  getOptionLabel: (data) => data.name,
                  getOptionValue: (data) => data.id + "",
                  value: !!(purchase == null ? void 0 : purchase.supplier) ? suppliers.filter(
                    (option) => {
                      var _a;
                      return option.id === ((_a = purchase == null ? void 0 : purchase.supplier) == null ? void 0 : _a.id);
                    }
                  ) : formData.id
                }
              )
            ] }),
            /* @__PURE__ */ jsx("div", { className: " col-sm-6", children: /* @__PURE__ */ jsx("label", { htmlFor: "", className: "control-label" }) })
          ] })
        ] }) }),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Payment Information" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: " Paid Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  required: true,
                  type: "text",
                  className: "form-control",
                  value: formData.paidAmount,
                  id: "totalPaid",
                  name: "paidAmount",
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Payable Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  disabled: true,
                  className: "form-control",
                  name: "note",
                  value: totalPayable
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Note" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "note",
                  value: formData.note,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "References" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "reference",
                  value: formData.reference,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Purchase Date" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  disabled: true,
                  value: (purchase == null ? void 0 : purchase.trans_date) ? purchase.trans_date : (/* @__PURE__ */ new Date()).toLocaleDateString("en-GB")
                }
              )
            ] }),
            /* @__PURE__ */ jsx(
              "input",
              {
                type: "text",
                value: "purchases_return",
                hidden: true,
                name: "transactionType"
              }
            )
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs("div", { className: " ", children: [
          /* @__PURE__ */ jsxs("table", { className: "table table-bordered item-table", children: [
            /* @__PURE__ */ jsx("thead", { children: /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsx("th", { children: "Item" }),
              /* @__PURE__ */ jsx("th", { children: "Price" }),
              /* @__PURE__ */ jsx("th", { children: "Purchase Quantity" }),
              /* @__PURE__ */ jsx("th", { children: "Return Quantity" })
            ] }) }),
            /* @__PURE__ */ jsx("tbody", { children: (selectedItems || []).map((item, index) => /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsxs("td", { children: [
                items.filter(
                  (filterItem) => filterItem.id == parseInt(item.item_id + "")
                ).map((filteredItem) => filteredItem.name),
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][item_id]`,
                    value: item.item_id
                  }
                ),
                item.id && /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][id]`,
                    value: item.id
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.price,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][price]`,
                    value: item.price
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.quantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][quantity]`,
                    value: item.quantity
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.returnQuantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    required: true,
                    type: "number",
                    name: `transaction_items[${item.item_id}][returnQuantity]`,
                    value: item.returnQuantity,
                    onChange: (e) => setFormData((prev) => {
                      return { ...prev, returnQuantity: e.target.value };
                    })
                  }
                )
              ] }),
              /* @__PURE__ */ jsx("td", { children: /* @__PURE__ */ jsx(
                "input",
                {
                  type: "hidden",
                  name: `transaction_items[${item.item_id}][total]`,
                  value: item.total
                }
              ) })
            ] }, index)) })
          ] }),
          " "
        ] }),
        /* @__PURE__ */ jsx("div", { className: "mt-2 p-3 text-right", children: /* @__PURE__ */ jsx("button", { type: "submit", className: "btn btn-primary mt-3 float-right", children: "Save" }) })
      ]
    }
  ) }) });
}
function SalesReturnForm({ sales }) {
  const customers = (window == null ? void 0 : window.customers) ?? [];
  console.log("customers :>> ", customers);
  const items = (window == null ? void 0 : window.items) ?? [];
  console.log("items", items);
  const [formData, setFormData] = useState({
    paidAmount: 0,
    price: 0,
    quantity: 0,
    total: 0,
    note: "",
    reference: "",
    item_id: 0,
    returnQuantity: 0
  });
  useState(null);
  const [selectedItems, setSelectedItems] = useState((sales == null ? void 0 : sales.sales_items) || []);
  console.log("salesItem", sales);
  console.log("formData :>> ", formData);
  console.log("selectedItems :>> ", selectedItems);
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };
  const totalPayable = selectedItems.reduce(
    (total, item) => total + parseInt(item.total + "", 10),
    0
  );
  const handleFormSubmit = (e) => {
    e.preventDefault();
    if (!selectedItems.length) {
      alert("Please add at least one item.");
      return;
    }
    const form = e.target;
    form.submit();
  };
  return /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx("div", { className: "panel-body row", children: /* @__PURE__ */ jsxs(
    "form",
    {
      action: window == null ? void 0 : window.action_route,
      onSubmit: handleFormSubmit,
      method: "post",
      autoComplete: "off",
      className: "form-horizontal validate   ",
      encType: "multipart/form-data",
      children: [
        (sales == null ? void 0 : sales.id) && /* @__PURE__ */ jsx("input", { type: "hidden" }),
        ReactHtmlParser(window == null ? void 0 : window.csrf_field),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Sales Form" }),
          /* @__PURE__ */ jsx("div", { className: "row", children: /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
            /* @__PURE__ */ jsx("label", { className: " control-label", children: "Customer Name" }),
            /* @__PURE__ */ jsx(
              Select,
              {
                required: true,
                name: "supplierOrCustomerId",
                className: "col-12",
                options: customers,
                getOptionLabel: (data) => data.first_name,
                getOptionValue: (data) => data.id + "",
                value: !!(sales == null ? void 0 : sales.customer) ? customers.filter(
                  (option) => {
                    var _a;
                    return option.id === ((_a = sales == null ? void 0 : sales.customer) == null ? void 0 : _a.id);
                  }
                ) : formData.id
              }
            )
          ] }) })
        ] }) }),
        /* @__PURE__ */ jsx("div", { className: "col-md-6 mb-4", children: /* @__PURE__ */ jsxs("div", { className: "shadow p-3", children: [
          /* @__PURE__ */ jsx("h6", { className: "text-center", children: "Payment Information" }),
          /* @__PURE__ */ jsxs("div", { className: "row", children: [
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: " Paid Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  required: true,
                  type: "text",
                  className: "form-control",
                  value: formData.paidAmount,
                  id: "totalPaid",
                  name: "paidAmount",
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Payable Amount" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  disabled: true,
                  className: "form-control",
                  name: "note",
                  value: totalPayable
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Note" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "note",
                  value: formData.note,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "References" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  name: "reference",
                  value: formData.reference,
                  onChange: handleInputChange
                }
              )
            ] }),
            /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
              /* @__PURE__ */ jsx("label", { className: "control-label", children: "Sales Date" }),
              /* @__PURE__ */ jsx(
                "input",
                {
                  type: "text",
                  className: "form-control",
                  disabled: true,
                  value: (sales == null ? void 0 : sales.trans_date) ? sales.trans_date : (/* @__PURE__ */ new Date()).toLocaleDateString("en-GB")
                }
              )
            ] }),
            /* @__PURE__ */ jsx(
              "input",
              {
                type: "text",
                value: "sales_return",
                hidden: true,
                name: "transactionType"
              }
            )
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs("div", { className: " ", children: [
          /* @__PURE__ */ jsxs("table", { className: "table table-bordered item-table", children: [
            /* @__PURE__ */ jsx("thead", { children: /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsx("th", { children: "Item" }),
              /* @__PURE__ */ jsx("th", { children: "Price" }),
              /* @__PURE__ */ jsx("th", { children: "Sell Quantity" }),
              /* @__PURE__ */ jsx("th", { children: "Return Quantity " })
            ] }) }),
            /* @__PURE__ */ jsx("tbody", { children: (selectedItems || []).map((item, index) => /* @__PURE__ */ jsxs("tr", { children: [
              /* @__PURE__ */ jsxs("td", { children: [
                items.filter(
                  (filterItem) => filterItem.id == parseInt(item.item_id + "")
                ).map((filteredItem) => filteredItem.name),
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][item_id]`,
                    value: item.item_id
                  }
                ),
                item.id && /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][id]`,
                    value: item.id
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.price,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][price]`,
                    value: item.price
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.quantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    type: "hidden",
                    name: `transaction_items[${item.item_id}][quantity]`,
                    value: item.quantity
                  }
                )
              ] }),
              /* @__PURE__ */ jsxs("td", { children: [
                item.returnQuantity,
                /* @__PURE__ */ jsx(
                  "input",
                  {
                    required: true,
                    type: "number",
                    name: `transaction_items[${item.item_id}][returnQuantity]`,
                    value: formData.returnQuantity,
                    onChange: (e) => setFormData((prev) => {
                      return { ...prev, returnQuantity: e.target.value };
                    })
                  }
                )
              ] })
            ] }, index)) })
          ] }),
          " "
        ] }),
        /* @__PURE__ */ jsx("div", { className: "mt-2 p-3 text-right", children: /* @__PURE__ */ jsx("button", { type: "submit", className: "btn btn-primary mt-3 float-right", children: "Save" }) })
      ]
    }
  ) }) });
}
console.log("loaded JS");
const purchaseForm = document.getElementById("inventory-form");
if (purchaseForm) {
  let component = /* @__PURE__ */ jsx(PurchaseForm, {});
  if (purchaseForm.hasAttribute("data-purchase")) {
    const purchase = purchaseForm.getAttribute("data-purchase");
    component = /* @__PURE__ */ jsx(PurchaseForm, { purchase: JSON.parse(purchase) });
  }
  ReactDOM.createRoot(purchaseForm).render(component);
}
const salesForm = document.getElementById("sales-form");
if (salesForm) {
  let component = /* @__PURE__ */ jsx(SalesForm, {});
  if (salesForm.hasAttribute("data-sales")) {
    const sales = salesForm.getAttribute("data-sales");
    component = /* @__PURE__ */ jsx(SalesForm, { sales: JSON.parse(sales) });
  }
  ReactDOM.createRoot(salesForm).render(component);
}
const purchaseReturnForm = document.getElementById("purchases-return-form");
if (purchaseReturnForm) {
  let component = /* @__PURE__ */ jsx(PurchaseReturnForm, {});
  if (purchaseReturnForm.hasAttribute("data-purchase")) {
    const purchase = purchaseReturnForm.getAttribute("data-purchase");
    component = /* @__PURE__ */ jsx(PurchaseReturnForm, { purchase: JSON.parse(purchase) });
  }
  ReactDOM.createRoot(purchaseReturnForm).render(component);
}
const salesReturnForm = document.getElementById("sales-return-form");
if (salesReturnForm) {
  let component = /* @__PURE__ */ jsx(SalesReturnForm, {});
  if (salesReturnForm.hasAttribute("data-sales")) {
    const sales = salesReturnForm.getAttribute("data-sales");
    component = /* @__PURE__ */ jsx(SalesReturnForm, { sales: JSON.parse(sales) });
  }
  ReactDOM.createRoot(salesReturnForm).render(component);
}
