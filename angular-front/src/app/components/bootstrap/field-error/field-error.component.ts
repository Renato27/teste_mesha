import { Component, OnInit, Input } from '@angular/core';
import { AbstractControl, FormControl } from '@angular/forms';

@Component({
  selector: 'field-error',
  templateUrl: './field-error.component.html',
  styleUrls: ['./field-error.component.css'],
  host:{
    'class': 'invalid-feedback'
  }
})
export class FieldErrorComponent implements OnInit {

  @Input()
  field!: FormControl | AbstractControl | null;

  constructor() { }

  ngOnInit(): void {
  }

  get errorKeys(){
    return this.errors !== null ? Object.keys(this.errors) : null;
  }

  get errors(){
    return this.field !== null ? this.field.errors : null;
  }

  showError(){
    return this.field !== null ? this.field.invalid && (this.field.dirty || this.field.touched) : null
  }

}
