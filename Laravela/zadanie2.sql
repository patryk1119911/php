SELECT * FROM CarAssignments
WHERE UserID = 1
  AND AssignmentStartTime <= NOW()
  AND (AssignmentEndTime IS NULL OR AssignmentEndTime >= NOW());