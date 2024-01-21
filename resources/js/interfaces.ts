export interface IPurchaseFormData {
  item_id: number;
  price: number;
  quantity: number;
  total: number;
  paidAmount?: number;
  note?: string;
  reference?: string;

  /**
   * Purchase ID for editing.
   */
  id?: number;
}
export interface ISalesFormData {
  item_id: number;
  price: number;
  quantity: number;
  total: number;
  paidAmount?: number;
  note?: string;
  reference?: string;

  /**
   * Purchase ID for editing.
   */
  id?: number;
}

export interface ITransaction {
  id: number;
  supplier_id: number;
  price: number;
  total: number;
  paidAmount: number;
  note: string;
  reference: string;
  created_at: string;
  updated_at: string;
  trans_date: string;
  items: Array<IPurchaseFormData>;
}

export interface ISupplier {
  name: string;
  id: number;
}
export interface ICustomer {
  first_name: string;
  id: number;
}
export interface ICustomer {
  name: string;
  id: number;
}

export interface IItem {
  name: string;
  id: number;
}

declare global {
  interface Window {
    suppliers?: Array<ISupplier>;
    customers?: Array<ICustomer>;
    items?: Array<IItem>;

    /**
     * Laravel Action route
     */
    action_route?: string;

    /**
     * Laravel CSRF token
     */
    csrf_field?: string;
  }
}
