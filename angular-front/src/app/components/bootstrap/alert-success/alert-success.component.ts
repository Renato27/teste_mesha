import { Component, EventEmitter, OnInit, Output, Input } from '@angular/core';

@Component({
  selector: 'alert-success',
  templateUrl: './alert-success.component.html',
  styleUrls: ['./alert-success.component.css']
})
export class AlertSuccessComponent implements OnInit {

  @Output()
  showChange: EventEmitter<boolean> = new EventEmitter<boolean>();

  _show: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  @Input()
  set show(value: boolean){
    this._show = value;
    this.showChange.emit(value);
  }

  hide(){
    this.show = false;

  }
}
