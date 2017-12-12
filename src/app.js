"use strict"
import { createStore } from 'redux';

//Step 3 define reducers
const reducer = function(state={ books:[] }, action){
  switch( action.type ){
    case "POST_BOOK":
    // let books = state.books.concat(action.payload);
    // //never use push()
    // return { books };
    // First example

    return { books : [...state.books, ...action.payload]}

    break;
  }
  return state;
}

//Step 1 create the store
const store = createStore(reducer);

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
    descripttion : 'this is the book descripttion',
    price: 33.33
  },
  {
    id: 2,
    title : 'this is the second book title',
    descripttion : 'this is the second book descripttion',
    price: 50
  }]
})
// Dispatch a second action
store.dispatch({
  type: "POST_BOOK",
  payload : [{
    id: 3,
    title : 'this is the third book title',
    descripttion : 'this is the third book descripttion',
    price: 44
  }]

})
