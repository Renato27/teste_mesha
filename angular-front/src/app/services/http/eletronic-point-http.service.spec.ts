import { TestBed } from '@angular/core/testing';

import { EletronicPointHttpService } from './eletronic-point-http.service';

describe('EletronicPointHttpService', () => {
  let service: EletronicPointHttpService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EletronicPointHttpService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
