import { Injectable } from '@angular/core';
import { environment } from './../../../environments/environment';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { EletronicPoint } from './../../models';
import {map} from 'rxjs/operators';
import { SearchParams, SearchParamsBuilder } from './../http-resource';

@Injectable({
  providedIn: 'root'
})
export class EletronicPointHttpService {

  private baseUrl = `${environment.api.url}/eletronicPoints`;

  constructor(private http: HttpClient) { }

  list(searchParams: SearchParams): Observable<{data: Array<EletronicPoint>, meta: any}>{
    const sParams = new SearchParamsBuilder(searchParams).makeObject();
    const params = new HttpParams({
      fromObject: (<any>sParams)
  })
    return this.http
    .get<{data: Array<EletronicPoint>, meta: any}>
    (`${this.baseUrl}`, {params});
  }

  get(id : number): Observable<EletronicPoint>{
    return this.http.get<{data: EletronicPoint}>
          (`${this.baseUrl}/ ${id}`)
         .pipe(
           map(response => response.data)
         )
  }

  create(data: EletronicPoint): Observable<EletronicPoint>{
    return this.http.post<{data: EletronicPoint}>(`${this.baseUrl}`, data)
         .pipe(
          map(response => response.data)
        )
  }

  validate(id: number): Observable<EletronicPoint>{
    return this.http.post<{data: EletronicPoint}>
        (`${environment.api.url}/register/${id}/validation`, {})
         .pipe(
          map(response => response.data)
        )
  }
}
