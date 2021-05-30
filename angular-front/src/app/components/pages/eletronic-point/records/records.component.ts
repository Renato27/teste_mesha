import { Component, OnInit } from '@angular/core';
import { EletronicPoint } from './../../../../models';
import { EletronicPointHttpService } from './../../../../services/http/eletronic-point-http.service';

@Component({
  selector: 'app-records',
  templateUrl: './records.component.html',
  styleUrls: ['./records.component.css']
})
export class RecordsComponent implements OnInit {

  records: Array<EletronicPoint> = [];

  pagination = {
    page: 1,
    totalItems: 0,
    itemsPerPage: 15
  };

  searchText!: string;


  constructor(private eletronicPointHttp: EletronicPointHttpService) { }

  ngOnInit(): void {
    this.getRecords();
  }

  getRecords(){
    this.eletronicPointHttp.list({
      page: this.pagination.page,
      search: this.searchText
    })
    .subscribe(response => {
      this.records = response.data;
      this.pagination.totalItems = response.meta.total;
      this.pagination.itemsPerPage = response.meta.per_page
    })
  }

  pageChanged(page: any){
    console.log(page);
    this.pagination.page = page;
    this.getRecords()
  }

  search(search: string) : void{
    this.searchText = search;
    this.getRecords()
  }

}
