import React, { Component } from 'react';
export class ResourceFilter extends Component {
  constructor(props) {
    super(props);
    const limit = 5;
    this.state = {
      inputValue: '',
      serviceItems: limit,
      // industryItems: limit,
      resourceItems: limit,
      serviceExpand: false,
      // industryExpand: false,
      resourceExpand: false
    }
    this.showMoreResource = this.showMoreResource.bind(this);
    this.showMoreService = this.showMoreService.bind(this);
    // this.showMoreIndustry = this.showMoreIndustry.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  filterServices(service, resourceType) {
    let serviceArray = [];
    let filteredServiceArray = service.filter( (cat) => {
      return cat[resourceType].length > 0;
    } );

    filteredServiceArray.forEach( (item) => {
      let currentItem = item[resourceType];
      if( currentItem.indexOf(', ') !== -1 ) {
        let splitArray = currentItem.split(',')
        splitArray.forEach( (singleRepeat) => {
          serviceArray.push(singleRepeat);
        });
      } else {
        serviceArray.push(currentItem);
      }
    });
    return Array.from(new Set(serviceArray));
  }

  showMoreService(section) {
    this.state.serviceItems === 5 ? (
      this.setState({ serviceItems: section.length, serviceExpand: true })
    ) : (
      this.setState({ serviceItems: 5, serviceExpand: false })
    )
  }

  // showMoreIndustry(section) {
  //   this.state.industryItems === 5 ? (
  //     this.setState({ industryItems: section.length, industryExpand: true })
  //   ) : (
  //     this.setState({ industryItems: 5, industryExpand: false })
  //   )
  // }

  showMoreResource(section) {
    this.state.resourceItems === 5 ? (
      this.setState({ resourceItems: section.length, resourceExpand: true })
    ) : (
      this.setState({ resourceItems: 5, resourceExpand: false })
    )
  }

  handleChange(event) {
    this.setState( {
      inputValue: event.target.value
    })
  }

  handleSubmit(event) {
    (() => this.props.addFilter(this.state.inputValue))();
    event.preventDefault();
  }

  render() {
    if( this.props.data ) {
      const filteredService = this.filterServices(this.props.data, 'resource_service');
      const filteredType = this.filterServices(this.props.data, 'resource_type');
      // const filteredIndustry = this.filterServices(this.props.data, 'resource_industry');
      return(
        <div className="resources-filter">
          <h2>Filter Resources</h2>
          <form onSubmit={this.handleSubmit}>
            <input type="text" value={this.state.inputValue} onChange={this.handleChange} placeholder="Filter" />
          </form>
          <ul className="selected-services">
            {
              this.props.categories.map((service, index) => {
                return (
                  <li onClick={() => this.props.removeItem(service)} key={index}>
                    <span className="remove-item"></span>
                    {service}
                  </li>
                )
              })
            }
          </ul>
          <hr></hr>
          <h4>Services</h4>
          <ul>
            {
              filteredService.slice(0, this.state.serviceItems).map((service, index) => {
                return <li onClick={() => this.props.addFilter(service)} key={index}>{service}</li>
              })
            }
            {
              filteredService.length > 5 &&
                <li onClick={() => this.showMoreService(filteredService)}>
                  {
                    this.state.serviceExpand ? (
                      <span className="up-arrow">Show Less</span>
                    ) : (
                      <span className="down-arrow">Show More</span>
                    )
                  }
                </li>
            }
          </ul>
          <hr></hr>
          <h4 className="border-top">Resource Type</h4>
          <ul>
            {
              filteredType.slice(0, this.state.resourceItems).map((resourceType, index) => {
                return <li onClick={() => this.props.addFilter(resourceType)} key={index}>{resourceType}</li>
              })
            }
            {
              filteredType.length > 5 &&
                <li onClick={() => this.showMoreResource(filteredType)}>
                  {
                    this.state.resourceExpand ? (
                      <span className="up-arrow">Show Less</span>
                    ) : (
                      <span className="down-arrow">Show More</span>
                    )
                  }
                </li>
            }
          </ul>
          <hr></hr>
          <span className="fig-btn" onClick={this.props.clearFilters}>Clear All</span>
        </div>
      );
    }

    return null;
  }

}
