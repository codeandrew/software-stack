"use strict"
import { createStore } from 'redux';

//IMPORT COMBINED REDUCERS
import reducers from './reducers'

//Step 1 create the store
const store = createStore(reducers);

store.subscribe(function(){
  console.log('current state is: ' , store.getState());
  // console.log('current price: ', store.getState()[1].price);
})
//Step 2 create and dispatch actions
//CRUD operations
// Create
// Read
// Update
// Delete

store.dispatch({
  type: "POST_BOOK",
  payload : [{
    id: 1,
    title : 'this is the book title',
    description : 'this is the book descripttion',
    price: 33.33
  },
  {
    id: 2,
    title : 'this is the second book title',
    description : 'this is the second book descripttion',
    price: 50
  }]
})
// Dispatch a second action
store.dispatch({
  type: "DELETE_BOOK",
  payload : { id: 1 }
})
//
store.dispatch({
  type : "UPDATE_BOOK",
  payload : {
    id : 2,
    title : ' Learn React in 24hrs'
  }
})
