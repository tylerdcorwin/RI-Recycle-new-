import React, { Component } from 'react';

export class Totals extends Component {

  constructor(props) {
    super(props);
    this.state = {};
  }

  calculateDisposed() {
    let enrollment = this.props.enrollment;
    let hiddenVal = this.props.hiddenFactor;
    return (enrollment * hiddenVal) / 2000;
  }

  calculateDonated() {
    return ( ( (this.props.enrollment * this.props.hiddenFactor) / 2000 ) * this.props.untouched )
  }

  render() {
    let disposed = this.calculateDisposed();
    let donated = this.calculateDonated();
    return (
      <div className="results-con">
        <div className="disposed-con">
          <div className="content-con">
            <h3>Total Estimated Food Waste Disposed Annually:</h3>
          </div>
          <div className="school-waste">
            <h3 className="total-disposed">{disposed.toFixed(2)}<br/>Tons</h3>
          </div>
        </div>
        <div className="donated-con">
          <div className="content-con">
            <h3>Total Estimated Food That Could Be Donated:</h3>
          </div>
          <div className="donated-img">
            <h3 className="total-donated">{donated.toFixed(2)}<br/>Tons</h3>
          </div>
        </div>
      </div>
    );
  }



}
