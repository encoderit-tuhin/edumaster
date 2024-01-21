import React, { useState } from "react";
import ReactHtmlParser from "react-html-parser";
import Select from "react-select";
import { IPurchaseFormData, ITransaction } from "../interfaces";

export default function PurchaseReturnForm({
  purchase,
}: {
  purchase: ITransaction;
}) {
  const suppliers = window?.suppliers ?? [];
  console.log("suppliers restu", suppliers);
  const items = window?.items ?? [];
  const [formData, setFormData] = useState<IPurchaseFormData>({
    paidAmount: 0,
    price: 0,
    quantity: 0,
    total: 0,
    note: "",
    reference: "",
    item_id: 0,
  });
  const [productIndex, setProductIndex] = useState(null);
  const [selectedItems, setSelectedItems] = useState(purchase?.purchases_items || []);
console.log('purchase :>> ', purchase);
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  
  const checkAlreadyAdded = (item) => {
    let itemAlreadyAdded = selectedItems.some(
      (obj) => parseInt(obj.item_id + "") === parseInt(item.id)
    );
    return itemAlreadyAdded;
  };

  const handleDeleteItem = (index) => {
    const updatedItems = [...selectedItems];
    updatedItems.splice(index, 1); // Remove the item at the specified index
    setSelectedItems(updatedItems);
  };

  const handleEditItem = (item, index) => {
    setProductIndex(index);
    setFormData(item);
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
    // submit the form
    form.submit();
  };
  return (
    <div>
      <div className="panel-body row">
        <form
          action={window?.action_route}
          onSubmit={handleFormSubmit}
          method="post"
          autoComplete="off"
          className="form-horizontal validate   "
          encType="multipart/form-data"
        >
          
          {ReactHtmlParser(window?.csrf_field)}
          <div className="col-md-6 mb-4">
            <div className="shadow p-3">
              <h6 className="text-center">Purchase Return Form</h6>

              <div className="row">
                <div className="col-md-6">
                  <label className=" control-label">Supplier Name</label>
                  <Select
                 
                    name="supplierOrCustomerId"
                    className="col-12"
                    options={suppliers}
                    getOptionLabel={(data) => data.name}
                    getOptionValue={(data) => data.id + ""}
                    value={
                      !!purchase?.supplier
                        ? suppliers.filter(
                            (option) => option.id === purchase?.supplier?.id
                          )
                        : formData.id
                    }
                  />
                </div>

                {/* <div className="col-sm-6">
                  <label htmlFor="" className="control-label">
                    Item Name
                  </label>

                  <Select 
                    
                    options={items}
                    name="item_id"
                    value={
                      !!formData.item_id
                        ? items.find((item) => item.id === formData.item_id)
                        : null
                    }
                    getOptionLabel={(data) => data.name}
                    getOptionValue={(data) => data.id + ""}
                    onChange={(item) => {
                      checkAlreadyAdded(item)
                        ? alert("Item already exists")
                        : setFormData((prev) => {
                            return { ...prev, item_id: item?.id || 0 };
                          });
                    }}
                  />
                </div> */}

                {/* <div className=" col-sm-6 hidden">
                  <label htmlFor="" className="control-label">
                    Price
                  </label>

                  <input
                    type="number"
                    name="price"
                    className="form-control price-input"
                    placeholder="price"
                    value={formData.price}
                    onChange={handleInputChange}
                  />
                </div>

                <div className=" col-sm-6">
                  <label htmlFor="" className="control-label">
                    Sell Quantity
                  </label>

                  <input
                    type="number"
                    name="quantity"
                    className="form-control price-input"
                    placeholder="quantity"
                    value={formData.quantity}
                    onChange={handleInputChange}
                  />
                </div> */}

                <div className=" col-sm-6">
                  <label htmlFor="" className="control-label"></label>

                </div>
              </div>
            </div>
          </div>
          <div className="col-md-6 mb-4">
            <div className="shadow p-3">
              <h6 className="text-center">Payment Information</h6>

              <div className="row">
                <div className="col-md-6">
                  <label className="control-label"> Paid Amount</label>
                  <input
                    required
                    type="text"
                    className="form-control"
                    value={formData.paidAmount}
                    id="totalPaid"
                    name="paidAmount"
                    onChange={handleInputChange}
                  />
                </div>

                <div className="col-md-6">
                  <label className="control-label">Payable Amount</label>
                  <input
                    type="text"
                    disabled
                    className="form-control"
                    name="note"
                    value={totalPayable}
                  />
                </div>

                <div className="col-md-6">
                  <label className="control-label">Note</label>
                  <input
                    type="text"
                    className="form-control"
                    name="note"
                    value={formData.note}
                    onChange={handleInputChange}
                  />
                </div>

                <div className="col-md-6">
                  <label className="control-label">References</label>
                  <input
                    type="text"
                    className="form-control"
                    name="reference"
                    value={formData.reference}
                    onChange={handleInputChange}
                  />
                </div>

                <div className="col-md-6">
                  <label className="control-label">Purchase Date</label>
                  <input
                    type="text"
                    className="form-control"
                    disabled
                    value={
                      purchase?.trans_date
                        ? purchase.trans_date
                        : new Date().toLocaleDateString("en-GB")
                    }
                  />
                </div>

                <input
                  type="text"
                  value="purchases_return"
                  hidden
                  name="transactionType"
                />
              </div>
            </div>
          </div>

          <div className=" ">
            <table className="table table-bordered item-table">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Price</th>
                  <th>Purchase Quantity</th>
                  <th>Return Quantity</th>
                </tr>
              </thead>
              <tbody>
                {(selectedItems || []).map((item, index) => (
                  <tr key={index}>
                    <td>
                      {items
                        .filter(
                          (filterItem) =>
                            filterItem.id == parseInt(item.item_id + "")
                        )
                        .map((filteredItem) => filteredItem.name)}
                      <input
                        type="hidden"
                        name={`transaction_items[${item.item_id}][item_id]`}
                        value={item.item_id}
                      />
                      {item.id && (
                        <input
                          type="hidden"
                          name={`transaction_items[${item.item_id}][id]`}
                          value={item.id}
                        />
                      )}
                    </td>
                    <td>
                      {item.price}
                      <input
                        type="hidden"
                        name={`transaction_items[${item.item_id}][price]`}
                        value={item.price}
                      />
                    </td>
                    <td>
                      {item.quantity}
                      <input
                        type="hidden"
                        name={`transaction_items[${item.item_id}][quantity]`}
                        value={item.quantity}
                      />
                    </td>
                    <td>
                      {item.returnQuantity}
                      <input
                        required
                        type="number"
                        name={`transaction_items[${item.item_id}][returnQuantity]`}
                        value={item.returnQuantity}
                        onChange={(e) => 
                          setFormData((prev) => {
                            return { ...prev, returnQuantity: e.target.value };
                          })
                        }
                      />
                    </td>
                    <td>
                      <input
                        type="hidden"
                        name={`transaction_items[${item.item_id}][total]`}
                        value={item.total}
                      />
                    </td>
                   
                  </tr>
                ))}
              </tbody>
            </table>{" "}
          </div>

          <div className="mt-2 p-3 text-right">
            <button type="submit" className="btn btn-primary mt-3 float-right">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}
