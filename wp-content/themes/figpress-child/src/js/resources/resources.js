import React, { Component } from 'react';
import { render } from 'react-dom';
import { ResourceContainer } from './resourceContainer';

const requestUrl = site_url + '/wp-json/wp/v2/media/';


class Resources extends Component {
  constructor(props) {
    super(props);
    this.state = {
      dataRoute: `${site_url}/wp-json/wp/v2/pages/${currentpageid}`,
      acfData: [],
      images: []
    }
  }

  componentDidMount() {
    // manip string to strip /ph/ or /in/
    // Patch fix needs to be reworked at a later date,
    // NOTE: may need to rework everything if field is switched to relationship
    let imgUrl = this.state.dataRoute;
    if ( imgUrl.indexOf('/ph') !== -1 ) {
      imgUrl.replace('/ph', '');
    } else if ( imgUrl.indexOf('/in') !== -1 ) {
      imgUrl.indexOf('/in', '');
    }
    fetch(imgUrl).then(
      (response) => {
        response.json().then(
          (data) => {
            let acfDataState = this.findCorrectBlock(data);
            this.setState({acfData: acfDataState});
            acfDataState.fig_resources.map( (gridItem, index) => {
              const gridId = gridItem.resource_link;
              fetch(requestUrl + gridItem.resource_image).then(
                (imgResponse) => {
                  imgResponse.json().then(
                    (dataSetTwo) => {
                      this.setState({ images: [...this.state.images, {id: gridId, img: dataSetTwo.source_url}] })
                    }
                  )
                }
              )
            });
          }
        )
      }
    );
  }

  findCorrectBlock(acfData) {
    let acfBlocks = acfData.fig_blocks;
    let resourcesBlockData = acfBlocks.filter(blockData => blockData.blockName === 'acf/resources');
    // if there's multiple resource blocks on a page we can use this to update the index
    let theResourceDataAttributes = resourcesBlockData[0].attrs.data;
    let theResource = this.turnBlockValueToACF(theResourceDataAttributes);
    return theResource;
  }

  turnBlockValueToACF(resourceDataAttributes) {
    let numOfDataAttributes = resourceDataAttributes.fig_resources;
    let resources = [];
    let resourceDataToReturn = {};
    for ( let i = 0; i < numOfDataAttributes; i++ ) {
      let resourceReturnValues = {};
      resourceReturnValues.resource_title = resourceDataAttributes['fig_resources_' + i + '_resource_title'];
      resourceReturnValues.resource_description = resourceDataAttributes['fig_resources_' + i + '_resource_description'];
      resourceReturnValues.resource_service = resourceDataAttributes['fig_resources_' + i + '_resource_service'];
      resourceReturnValues.resource_industry = resourceDataAttributes['fig_resources_' + i + '_resource_industry'];
      resourceReturnValues.resource_type = resourceDataAttributes['fig_resources_' + i + '_resource_type'];
      resourceReturnValues.resource_link = resourceDataAttributes['fig_resources_' + i + '_resource_link'];
      resourceReturnValues.resource_image = resourceDataAttributes['fig_resources_' + i + '_resource_image'];
      resources.push(resourceReturnValues);
    }
    resourceDataToReturn.fig_resources = resources;
    // console.log(resources);
    return resourceDataToReturn;
  }

  render() {
    return (
      <div>
        <ResourceContainer images={this.state.images} data={this.state.acfData.fig_resources} />
      </div>
    );
  }
}
if( document.querySelector('#resources-wrap') ) {
  render(<Resources />, document.querySelector('#resources-wrap'));
}
