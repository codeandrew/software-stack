"use strict"

const l = (msg1, msg2) => { console.log(msg1,msg2)}
//CART REDUCERS
export function cartReducers(state={cart:[]}, action ){
  switch(action.type){
    case "ADD_TO_CART":
      return {cart:[ ...state, ...action.payload] }
      break

    case "UPDATE_CART":
      const currentBookToUpdate = [...state.cart]
      const indexToUpdate = currentBookToUpdate.findIndex((book)=>{
        return book._id === action._id
      })
      l("indexToUpdate: ", indexToUpdate)
      const newBookToUpdate = {
        ...currentBookToUpdate[indexToUpdate],
        quantity : currentBookToUpdate[indexToUpdate].quantity +
        action.unit
      }
      l('currentBookToUpdate', currentBookToUpdate.slice(0,indexToUpdate))
      l('newBookToUpdate', newBookToUpdate)
      l('currentBookToUpdate+1', currentBookToUpdate.slice(indexToUpdate + 1))
      let cartUpdate = [
        ...currentBookToUpdate.slice(0,indexToUpdate),
        newBookToUpdate,
        // ...currentBookToUpdate.slice(indexToUpdate + 1)
      ]
      l("cartUpdate: ", cartUpdate )
      console.log("Slice :", currentBookToUpdate.slice(indexToUpdate + 1))
      return {
        ...state,
        cart : cartUpdate
      }

      break

    case "DELETE_CART_ITEM":
      return {cart:[ ...state, ...action.payload] }
      break

  }

  return state
}
