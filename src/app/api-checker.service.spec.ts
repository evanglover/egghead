import { TestBed, inject } from '@angular/core/testing';

import { ApiCheckerService } from './api-checker.service';

describe('ApiCheckerService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ApiCheckerService]
    });
  });

  it('should be created', inject([ApiCheckerService], (service: ApiCheckerService) => {
    expect(service).toBeTruthy();
  }));
});
