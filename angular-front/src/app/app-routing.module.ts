import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RegisterComponent } from './components/pages/eletronic-point/register/register.component';
import { RecordsComponent } from './components/pages/eletronic-point/records/records.component';
import { ValidateComponent } from './components/pages/eletronic-point/validate/validate.component';

const routes: Routes = [
  {
    path: 'registros',
    component: RecordsComponent
  },
  {
    path: 'RENATOMALDONADO/registrar',
    component: RegisterComponent
  },
  {
    path: 'RENATOMALDONADO/validar/:id',
    component: ValidateComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
