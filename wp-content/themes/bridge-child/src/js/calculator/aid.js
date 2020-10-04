import React, { Component } from 'react';

import { Students } from './costPerStudent';

export class Aid extends Component {

  constructor(props) {
    super(props);
    this.state = {
      aid: 0,
      elementaryCostPerYear: 0,
      middleCostPerYear: 0,
      highCostPerYear: 0,
      students: []
    };
  }

  componentDidUpdate(prevProps) {
    if (this.props !== prevProps) {
      this.calculateAid();
    }
  }

  calculateCosts(aid, cost) {
    let weightedPercentage = cost / this.props.tuitionTotal;
    let costPerYear = (cost - (aid * weightedPercentage));
    return costPerYear;
  }


  calculateAid() {
    let income;
    if ( isNaN(this.props.income) ) {
      income = 0;
    } else {
      income = this.props.income;
    }
    let maxAid = this.props.tuitionTotal * .25;
    let aid = this.props.tuitionTotal - (0.5 * (income - this.props.expenses));

    console.log('aid: ', aid);
    console.log('maxAid ', maxAid);
    if ( aid < 0 ) {
      this.setState({ aid: 0 });
    } else if ( aid > maxAid) {
      aid = maxAid;
      this.setState({ aid: maxAid });
    } else {
      this.setState({ aid: aid });
    }
    let students = [];
    if ( this.props.numOfElementaryStudents !== 0 ) {
      let elementaryStudents = {};
      let elementaryCostPerYear = this.calculateCosts(aid, this.props.elementaryCost);
      if ( elementaryCostPerYear > this.props.elementaryCost ) {
        elementaryCostPerYear = this.props.elementaryCost;
      } else if ( elementaryCostPerYear < 0 ) {
        elementaryCostPerYear = 0;
      }
      this.setState({ elementaryCostPerYear: elementaryCostPerYear });

      for ( let i = 0; i < this.props.numOfElementaryStudents; i++ ) {
        elementaryStudents.name = 'Elementary Student';
        elementaryStudents.costPerYear = elementaryCostPerYear;
        elementaryStudents.students = this.props.numOfElementaryStudents;
        students.push(elementaryStudents);
      }
    }
    if ( this.props.numOfMiddleStudents !== 0 ) {
      let middleStudents = {};
      let middleCostPerYear = this.calculateCosts(aid, this.props.middleCost);
      if ( middleCostPerYear > this.props.middleCost ) {
        middleCostPerYear = this.props.middleCost;
      } else if ( middleCostPerYear < 0 ) {
        middleCostPerYear = 0;
      }
      this.setState({ middleCostPerYear: middleCostPerYear });
      for ( let i = 0; i < this.props.numOfMiddleStudents; i++ ) {
        middleStudents.name = 'Middle School Student';
        middleStudents.costPerYear = middleCostPerYear;
        middleStudents.students = this.props.numOfMiddleStudents;
        students.push(middleStudents);
      }
    }
    if ( this.props.numOfHighStudents !== 0 ) {
      let highStudents = {};
      let highCostPerYear = this.calculateCosts(aid, this.props.highCost);
      if ( highCostPerYear > this.props.highCost ) {
        highCostPerYear = this.props.highCost;
      } else if ( highCostPerYear < 0 ) {
        highCostPerYear = 0;
      }
      this.setState({ highCostPerYear: highCostPerYear });
      for ( let i = 0; i < this.props.numOfHighStudents; i++ ) {
        highStudents.name = 'High School Student';
        highStudents.costPerYear = highCostPerYear;
        highStudents.students = this.props.numOfHighStudents;
        students.push(highStudents);
      }
    }
    this.setState({ students: students });
  }

  render() {
    return (
      <div>
        <Students
          students={this.state.students}
          aid={this.state.aid}
          tuitionTotal={this.props.tuitionTotal}
          disclaimer={this.props.disclaimer}
          applicationLink={this.props.applicationLink}
        />
      </div>
    )
  }

}
