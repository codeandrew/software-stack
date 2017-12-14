"use strict"
import React from 'react';
import { render } from 'react-dom';

import { applyMiddleware, createStore } from 'redux';
import logger from 'redux-logger'

//IMPORT COMBINED REDUCERS
import reducers from './reducers'
//IMPORT actions
import { addToCart } from './actions/cartActions'


//Step 1 create the store
const middleware = applyMiddleware(logger)
const store = createStore(reducers, middleware);

// store.subscribe(function(){
//   console.log('current state is: ' , store.getState());
//   // console.log('current price: ', store.getState()[1].price);
// })

import BooksList from './components/pages/booksList';

render(
  <BooksList /> ,
  document.querySelector('#app')
);



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

//-->> CART ACTIONS <<--
//ADD TO CART
store.dispatch({
  type: "ADD_TO_CART",
  payload : { id: 1 }
})
