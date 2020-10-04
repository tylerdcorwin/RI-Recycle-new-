import React, { Component } from 'react';

import { Aid } from './aid';

export class Calculate extends Component {

  constructor(props) {
    super(props);
    this.state = {
      tuitionTotal: 0,
      expensesTotal: 0,
      totalCostOfElementary: 0,
      totalCostOfMiddle: 0,
      totalCostOfHigh: 0,
      totalNumOfStudents: 0
    };
  }

  componentDidUpdate(prevProps) {
    if (this.props !== prevProps) {
      this.calculateTuition();
      this.calculateExpenses();
      this.calculateTotalNumOfStudents();
    }
  }

  calculateTotalNumOfStudents() {
    let totalNumOfStudents = this.props.elementaryStudents + this.props.middleStudents + this.props.highStudents;
    this.setState({
      totalNumOfStudents: totalNumOfStudents
    });
  }

  calculateExpenses() {
    let income;
    if ( isNaN(this.props.income) ) {
      income = 0;
    } else {
      income = this.props.income;
    }
    let expenses = ((0.45 * income) + (1500 * this.props.householdMembers) + this.props.costOfLiving);
    this.setState({
      expensesTotal: expenses
    });
  }

  calculateTuition() {
    let elementaryCost = this.props.elementaryStudents * this.props.elementaryCost;
    let middleCost = this.props.middleStudents * this.props.middleCost;
    let highCost = this.props.highStudents * this.props.highCost;
    let totalTuition = elementaryCost + middleCost + highCost;
    this.setState({
      tuitionTotal: totalTuition,
      totalCostOfElementary: elementaryCost,
      totalCostOfMiddle: middleCost,
      totalCostOfHigh: highCost
    });
  }

  render() {
    return (
      <div className="results-con">
        <Aid
          numOfElementaryStudents={this.props.elementaryStudents}
          numOfMiddleStudents={this.props.middleStudents}
          numOfHighStudents={this.props.highStudents}
          totalNumOfStudents={this.state.totalNumOfStudents}
          totalCostOfElementary={this.state.totalCostOfElementary}
          totalCostOfMiddle={this.state.totalCostOfMiddle}
          totalCostOfHigh={this.state.totalCostOfHigh}
          tuitionTotal={this.state.tuitionTotal}
          elementaryCost={this.props.elementaryCost}
          middleCost={this.props.middleCost}
          highCost={this.props.highCost}
          income={this.props.income}
          expenses={this.state.expensesTotal}
          disclaimer={this.props.disclaimer}
          applicationLink={this.props.applicationLink}
        />
      </div>
    )
  }

}
