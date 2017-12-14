"use strict"
import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';

import { applyMiddleware, createStore } from 'redux';
import logger from 'redux-logger'

//IMPORT COMBINED REDUCERS
import reducers from './reducers'
//IMPORT actions
import { addToCart } from './actions/cartActions'


//Step 1 create the store
const middleware = applyMiddleware(logger)
const store = createStore(reducers, middleware);


import BooksList from './components/pages/booksList';

render(
  <Provider store={store}>
    <BooksList />
  </Provider>,
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
