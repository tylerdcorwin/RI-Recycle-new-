import React, { Component } from 'react';
import { ResourceFilter } from './resourceFilter';
import { ResourceGrid } from './resourceGrid';

export class ResourceContainer extends Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedCategories: []
    };

    this.addFilter = this.addFilter.bind(this);
    this.clearFilters = this.clearFilters.bind(this);
    this.removeItem = this.removeItem.bind(this);
  }

  clearFilters() {
    this.setState({
      selectedCategories: []
      });
  }

  removeItem(item) {
    let currentCategories = this.state.selectedCategories;
    let categoryExists = currentCategories.indexOf(item);
    currentCategories.splice(categoryExists, 1);
    this.setState( {
      selectedCategories: currentCategories
    })
  }

  addFilter(category) {
    // Create a new set from the current state then check if the set already has
    let capitalState = this.state.selectedCategories.map((cat) => {
      return cat.toUpperCase();
    });
    let capitalCategory = category.toUpperCase();
    let categorySet = new Set(capitalState);
    if( !categorySet.has(capitalCategory) ) {
      this.setState({
        selectedCategories: [...this.state.selectedCategories, category ]
      })
    }
    return
  }

  render() {
    if( this.props.data ) {
      return (
        <div className="resources">
          <ResourceFilter removeItem={this.removeItem} clearFilters={this.clearFilters} data={this.props.data} addFilter={this.addFilter} categories={this.state.selectedCategories} />
          <ResourceGrid images={this.props.images} selectedCategories={this.state.selectedCategories} gridItemsState={this.state.selectedCategories} gridItems={this.props.data} />
        </div>
      )
    }
    return null;
  }
}
