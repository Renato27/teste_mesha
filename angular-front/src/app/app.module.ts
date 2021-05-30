import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AlertErrorComponent } from './components/bootstrap/alert-error/alert-error.component';
import { NavbarComponent } from './components/bootstrap/navbar/navbar.component';
import { RegisterComponent } from './components/pages/eletronic-point/register/register.component';
import { ValidateComponent } from './components/pages/eletronic-point/validate/validate.component';
import { RecordsComponent } from './components/pages/eletronic-point/records/records.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { NgxPaginationModule } from 'ngx-pagination';
import { NgxMaskModule } from 'ngx-mask';
import { AlertSuccessComponent } from './components/bootstrap/alert-success/alert-success.component';
import { FieldErrorComponent } from './components/bootstrap/field-error/field-error.component';
import { LoginComponent } from './components/pages/auth/login/login.component';
import { JwtModule } from '@auth0/angular-jwt';
import { HomeComponent } from './components/pages/home/home.component';

@NgModule({
  declarations: [
    AppComponent,
    AlertErrorComponent,
    NavbarComponent,
    RegisterComponent,
    ValidateComponent,
    RecordsComponent,
    AlertSuccessComponent,
    FieldErrorComponent,
    LoginComponent,
    HomeComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    NgxPaginationModule,
    NgxMaskModule.forRoot(),
    JwtModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
