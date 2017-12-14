"use strict"
import React from 'react';
import { connect } from 'react-redux';


class BookList extends React.Component{
  render(){
    console.log(" this.props.books :::",this.props.books)
    const booksList = this.props.books.map((booksArr)=>{
      return (
        <div key={booksArr.id}>
          <h2>{booksArr.title}</h2>
          <h3>{booksArr.description}</h3>
          <h3>{booksArr.price}</h3>
        </div>
      )
    })
    console.log(booksList)
    return (
      <div>
        <h1>Hello React! </h1>
        {booksList}
      </div>
    );
  }
}
function mapStateToProps(state){
  return{
    books : state.books.books
  }
}
export default connect(mapStateToProps)(BookList)
