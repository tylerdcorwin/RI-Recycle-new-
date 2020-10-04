import React, { Component } from 'react';

export class Students extends Component {

  constructor(props) {
    super(props);
    this.state = {
    };
  }

  calculatePaymentTotal() {
    let total = this.props.tuitionTotal.toFixed(2) - this.props.aid.toFixed(2);
    if ( total < 0 ) {
      total = 0;
    }
    return total;
  }

  render() {
    let students = this.props.students
    let payTotal = this.calculatePaymentTotal();
    return (
      <div className="results">
        <div className="tuition-icon"></div>
        <h6>You can expect to pay*</h6>
        <h1>{payTotal.toLocaleString('en-US', {
          style: 'currency',
          currency: 'USD',
        })}</h1>
        {
          students.map((student, index) => {
            return (
              <div key={index} className="student-amount">
                <p>{student.name} {index + 1}:</p>
                <p className="amount">{student.costPerYear.toLocaleString('en-US', {
                  style: 'currency',
                  currency: 'USD',
                })}</p>
              </div>
            )
          })
        }
        <a href={this.props.applicationLink} className="application">Get Started On Your Application</a>
        <p className="disclaimer">{this.props.disclaimer}</p>
      </div>
    )
  }

}
