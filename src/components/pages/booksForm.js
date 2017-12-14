"use strict"

import React from 'react'
import { Well, Panel, FormControl, FormGroup, ControlLabel, Button }
from 'react-bootstrap';

class BooksForm extends React.Component{
  render(){
    return (
      <Well>
        <Panel>
          <FormGroup controlId="Title">
            <ControlLabel>Title </ControlLabel>
            <FormControl
              type="text"
              placeholder="Enter Title"
              ref="title" 
            />
          </FormGroup>
          <FormGroup controlId="description">
            <ControlLabel>description </ControlLabel>
            <FormControl
              type="text"
              placeholder="Enter Description"
              ref="Description" 
            />
          </FormGroup>
          <FormGroup controlId="Price">
            <ControlLabel>Price </ControlLabel>
            <FormControl
              type="number"
              placeholder="Enter Price"
              ref="Price" 
            />
          </FormGroup>
          <Button bsStyle="primary"> Save Now</Button>
        </Panel>
      </Well>
    )
  }
}

export default BooksForm;
