import React, { Component } from 'react';

const requestUrl = site_url + '/wp-json/wp/v2/media/';

export class ResourceGrid extends Component {
  constructor(props) {
    super(props);

    this.state = {
      isHovering: false,
      hoverId: '',
      picUrl: [],
      picLoaded: false
    }

    this.isShowingHover = this.isShowingHover.bind(this);
    this.handleHoverOn = this.handleHoverOn.bind(this);
    this.handleHoverOff = this.handleHoverOff.bind(this);
    this.getImg = this.getImg.bind(this);
  }

  isShowingHover(num) {
    if( this.state.hoverId === num && this.state.isHovering === true ) {
      return true;
    }
  }

  handleHoverOn(index) {
    this.setState({isHovering: true, hoverId: index});
  }

  handleHoverOff() {
    this.setState({isHovering: false, hoverId: ''});
  }

  componentDidMount() {
    fetch(requestUrl)
      .then(response => response.json())
      .then(data => this.setState({ data }));
  }

  getImg(index) {
    let theChosenImg = this.props.images.find( img => img.id === index );
    // let displayedImage = site_url + '/wp-content/themes/figpress-child/src/img/resources.png';
    let displayedImage = '';
    if( theChosenImg !== undefined ) {
      displayedImage = theChosenImg.img;
    }
    return displayedImage;
  }

  render() {
    const gridItemsState = this.props.gridItemsState;
    let gridItems = this.props.gridItems;
    if( gridItemsState.length > 0 ) {
      gridItems = gridItems.filter((gridItem) => {

        return gridItemsState.some((arrItem) => {
          let resourceItemToCaps = arrItem.toUpperCase();
          let resourceCategoryToCaps = gridItem.resource_service.toUpperCase();
          // let resourceIndustyToCaps = gridItem.resource_industry.toUpperCase();
          let resourceTypeToCaps = gridItem.resource_type.toUpperCase();
          if( resourceCategoryToCaps.includes(resourceItemToCaps) || resourceTypeToCaps.includes(resourceItemToCaps) ) {
            return true;
          }
        });
      });
    }

    return(
      <div className="grid-layout">
        {
          gridItems.map((gridItem, index) => {
            return (
            <a href={gridItem.resource_link} target="_blank" aria-label={"Click to read more about " + gridItem.resource_title} onMouseEnter={() => this.handleHoverOn(index)} onMouseLeave={this.handleHoverOff} key={index} className="gridItem">
              {
                this.isShowingHover(index) &&
                  <div className="hovered-con">
                    <h4>{gridItem.resource_title}</h4>
                    <p>{gridItem.resource_description}</p>
                    <span>Read More  ></span>
                  </div>
              }
              <div style={{backgroundImage: 'url(' + this.getImg(gridItem.resource_link) + ')'}} className="gridItem-bg"></div>
              <div className="gridItem-title-con">
                <h4>{gridItem.resource_title}</h4>
                <p className="gridItem-category">{gridItem.resource_type}</p>
              </div>
            </a>
            )
          })
        }
      </div>
    )
  }
}
