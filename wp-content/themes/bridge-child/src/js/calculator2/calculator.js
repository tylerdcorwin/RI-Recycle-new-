import React, { Component } from 'react';
import { render } from 'react-dom';
import { Totals } from './totals';

const requestUrl = site_url + '/wp-json/wp/v2/media/';
let tonConversion = 2000;
let elemUntouched = 0.18;
let middleUntouched = 0.26;
let highUntouched = 0.113;
const schoolCard = document.querySelector('.school-choice');
const enrollCard = document.querySelector('.enrollment');
const resultsCard = document.querySelector('.results');

class Calculator extends Component {
  constructor(props) {
    super(props);
    this.state = {
      schoolHiddenValue: 0,
      enrollment: 0,
      untouched: 0,
    }
    this.handleEnrollmentChange = this.handleEnrollmentChange.bind(this);
    this.handleElementaryClick = this.handleElementaryClick.bind(this);
    this.handleMiddleClick = this.handleMiddleClick.bind(this);
    this.handleHighClick = this.handleHighClick.bind(this);
  }

  componentDidMount() {

  }

  handleEnrollmentChange(e) {
    this.setState({
      enrollment: e.target.value
    });
  }

  handleElementaryClick() {
    this.setState({
      schoolHiddenValue: 47,
      untouched: elemUntouched
    });
  }

  handleMiddleClick() {
    this.setState({
      schoolHiddenValue: 39.3,
      untouched: middleUntouched
    });
  }

  handleHighClick(e) {
    this.setState({
      schoolHiddenValue: 15.6,
      untouched: highUntouched
    });
  }

  handleSubmit(e) {
    e.preventDefault();
    // console.log(e);
  }


  render() {
    return (
      <div className="calculator-con" key="1">

        <div className="slider-con">

          <div className="calc-card school-choice active">
            <h2 className="school-title">Choose your school type</h2>
            <div className="school-choice-con">

              <div className="indiv-choice" onClick={this.handleElementaryClick} value="47">
                <div className="card-img elementary"></div>
                <h4 className="card-title">Elementary<br/>School</h4>
              </div>
              <div className="indiv-choice" onClick={this.handleMiddleClick} value="39.3">
                <div className="card-img middle"></div>
                <h4 className="card-title">Middle<br/>School</h4>
              </div>
              <div className="indiv-choice" onClick={this.handleHighClick} value="15.6">
                <div className="card-img high"></div>
                <h4 className="card-title">High<br/>School</h4>
              </div>

            </div>
          </div>

          <div className="calc-card enrollment">
            <h2 className="enrollment-title">Number of Students in your School</h2>
            <div className="content-con">
              <form className="enrollment-form" onSubmit={this.handleSubmit}>
                <input type="number" min="0" onChange={this.handleEnrollmentChange} />
              </form>
              <div className="cta-con">
                <a className="help-link" href="http://www.eride.ri.gov/reports.asp" target="_blank">Click Here if you don't know your Enrollment Number</a>
              </div>
            </div>
            <div className="btn-con">
              <span className="prev-btn">Go Back</span>
              <span className="next-btn">Estimate Food Waste</span>
            </div>
          </div>

          <div className="calc-card results">
            <div className="results-content-con">

              <Totals
                enrollment={this.state.enrollment}
                hiddenFactor={this.state.schoolHiddenValue}
                untouched={this.state.untouched}
              />

            </div>
            <div className="btn-con">
              <span className="back-to-enrollment">Go Back</span>
              <a href="#calculator" className="start-over">Start Over</a>
            </div>
          </div>


        </div>

      </div>
    );
  }
}

if( document.querySelector('#calculator') ) {
  render(<Calculator />, document.querySelector('#calculator'));
}
