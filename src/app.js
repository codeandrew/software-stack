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
      // use spread operator
      break;

    case "DELETE_BOOK" :
      const currentBookToDelete = [...state.books]
      const indexToDelete = currentBookToDelete.findIndex(
        function(book){
          console.log( action.payload );
          console.log(book)
          return book.id === action.payload.id;
        }
      )
      console.log( 'indexToDelete ', indexToDelete)
      return {books: [
        ...currentBookToDelete.slice(0, indexToDelete),
        ...currentBookToDelete.slice(indexToDelete + 1 )
      ]}
    break;

    case "UPDATE_BOOK" :
      const currentBookToUpdate = [...state.books]
      const indexToUpdate = currentBookToUpdate.findIndex(
        function(book){
          return book.id === action.payload.id
        }
      )
      console.log("indexToUpdate", indexToUpdate)
      const newBookToUpdate = {
        ...currentBookToUpdate[indexToUpdate],
        title : action.payload.title
      }
      console.log('what is it newBookToUpdate', newBookToUpdate)
      return {books: [
        ...currentBookToUpdate.slice(0, indexToUpdate),
        newBookToUpdate,
        ...currentBookToUpdate.slice(indexToUpdate + 1)
      ]}

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
