"use strict"
const books = [{
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

//BOOKS REDUCERS
export function booksReducers(state={
  books
}, action){
  switch( action.type ){
    case "GET_BOOKS":
      return { ...state, books :[...state.books]}
      break;

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
