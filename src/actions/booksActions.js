"use strict"

export function getBooks(){
  return {
    type : "GET_BOOKS"
  }
}

export function postBooks(book){
  return {
    type : "POST_BOOK",
    payload : book
  }
}

export function deleteBooks(id){
  return {
    type : "DELETE_BOOK",
    payload : id
  }
}
