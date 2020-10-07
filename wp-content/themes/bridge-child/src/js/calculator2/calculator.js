import React, { Component } from 'react';
import { render } from 'react-dom';

const requestUrl = site_url + '/wp-json/wp/v2/media/';


class Calculator extends Component {
  constructor(props) {
    super(props);
    this.state = {
      dataRoute: `${site_url}/wp-json/wp/v2/pages/${currentpageid}`,
      acfData: [],
      elementaryStudents: 0,
      middleStudents: 0,
      highStudents: 0,
      income: 0,
      tuition: 0,
      expenses: 0,
      aid: 0,
      householdMembers: 0,
      total: 0,
      value: 0,
    }
    this.handleIncomeChange = this.handleIncomeChange.bind(this);
    this.handleHouseholdMemberChange = this.handleHouseholdMemberChange.bind(this);
    this.handleElementaryChange = this.handleElementaryChange.bind(this);
    this.handleMiddleChange = this.handleMiddleChange.bind(this);
    this.handleHighChange = this.handleHighChange.bind(this);
  }

  componentDidMount() {

    let pageDataUrl = this.state.dataRoute;

    fetch(pageDataUrl).then(
      (response) => {
        response.json().then(
          (data) => {
            let acfDataState = this.findCorrectBlock(data);
            this.setState({acfData: acfDataState});
          }
        )
      }
    )
  }

  handleIncomeChange(e) {
    let lastState = this.state.income;
    let noChars = /[^0-9,.]+/g;
    if ( parseInt(e.currentTarget.value) === 0 ) {
      return;
    } else {
      let checkForChar = parseInt( e.currentTarget.value.replace(noChars, '') );
      if ( isNaN(checkForChar) ) {
        e.currentTarget.value = '';
      } else {
        e.currentTarget.value = checkForChar;
      }
      let currentIncomeValue = parseFloat(e.currentTarget.value);
      this.setState({
        income: currentIncomeValue
      });
    }

  }

  handleHouseholdMemberChange(e) {
    if ( e.currentTarget.value == '' ) {
      e.currentTarget.value = '';
    }
    this.setState({
      householdMembers: e.currentTarget.value,
     });
  }

  handleElementaryChange(e) {
    this.setState({
      elementaryStudents: e.target.value
    });
  }

  handleMiddleChange(e) {
    this.setState({
      middleStudents: e.target.value
    });
  }

  handleHighChange(e) {
    this.setState({
      highStudents: e.target.value
    });
  }

  findCorrectBlock(acfData) {
    let acfBlocks = acfData.acf;
    let dataToReturn = {}
    dataToReturn.elementaryCost = parseFloat(acfBlocks.calc_elementary_cost);
    dataToReturn.middleCost = parseFloat(acfBlocks.calc_middle_cost);
    dataToReturn.highCost = parseFloat(acfBlocks.calc_high_cost);
    dataToReturn.costOfLiving = parseFloat(acfBlocks.calc_cost_of_living);
    dataToReturn.incomeDesc = acfBlocks.calc_income_desc;
    dataToReturn.memberDesc = acfBlocks.calc_members_desc;
    dataToReturn.elementaryDesc = acfBlocks.calc_num_elementary_desc;
    dataToReturn.middleDesc = acfBlocks.calc_num_middle_desc;
    dataToReturn.highDesc = acfBlocks.calc_num_high_desc;
    dataToReturn.disclaimer = acfBlocks.calc_disclaimer_message;
    dataToReturn.applicationLink = acfBlocks.calc_application_url;
    return dataToReturn;
  }

  descriptionCheck(desc) {
    if ( desc !== '' && typeof(desc) !== 'undefined') {
      return true;
    }
  }

  render() {
    return (
      <div className="calculator-con" key="1">
        <div className="form-con">

          <p><strong>Annual Household Income</strong></p>
          {
            this.descriptionCheck(this.state.acfData.incomeDesc) &&
              <p>{this.state.acfData.incomeDesc}</p>
          }
          <span className="dollar-amount">
            <input type="text" min="0" pattern="[0-9]" onChange={this.handleIncomeChange} />
          </span>

          <p><strong>Total Household Members</strong></p>
          {
            this.descriptionCheck(this.state.acfData.memberDesc) &&
              <p>{this.state.acfData.memberDesc}</p>
          }
          <input type="number" min="0" onChange={this.handleHouseholdMemberChange} />

          <p><strong>Number of Elementary School Students</strong></p>
          {
            this.descriptionCheck(this.state.acfData.elementaryDesc) &&
              <p>{this.state.acfData.elementaryDesc}</p>
          }
          <div className="range-slider">
            <input id="elementary-range" className="rs-range" type="range" min="0" max="5" value={this.state.elementaryStudents} onChange={this.handleElementaryChange} step="1" />
            <span id="elementary-rs-bullet" className="rs-value">0</span>
          </div>

          <p><strong>Number of Middle School Students</strong></p>
          {
            this.descriptionCheck(this.state.acfData.middleDesc) &&
              <p>{this.state.acfData.middleDesc}</p>
          }
          <div className="range-slider">
            <input id="middle-range" className="rs-range" type="range" min="0" max="5" value={this.state.middleStudents} onChange={this.handleMiddleChange} step="1" />
            <span id="middle-rs-bullet" className="rs-value">0</span>
          </div>

          <p><strong>Number of High School Students</strong></p>
          {
            this.descriptionCheck(this.state.acfData.highDesc) &&
              <p>{this.state.acfData.highDesc}</p>
          }
          <div className="range-slider">
            <input id="high-range" className="rs-range" type="range" min="0" max="5" value={this.state.highStudents} onChange={this.handleHighChange} step="1" />
            <span id="high-rs-bullet" className="rs-value">0</span>
          </div>

        </div>
        <div className="results-wrap">
          <Calculate
            elementaryCost={this.state.acfData.elementaryCost}
            middleCost={this.state.acfData.middleCost}
            highCost={this.state.acfData.highCost}
            costOfLiving={this.state.acfData.costOfLiving}
            elementaryStudents={this.state.elementaryStudents}
            middleStudents={this.state.middleStudents}
            highStudents={this.state.highStudents}
            income={this.state.income}
            householdMembers={this.state.householdMembers}
            disclaimer={this.state.acfData.disclaimer}
            applicationLink={this.state.acfData.applicationLink}
          />

        </div>
      </div>
    );
  }
}

if( document.querySelector('#calculator') ) {
  render(<Calculator />, document.querySelector('#calculator'));
}
