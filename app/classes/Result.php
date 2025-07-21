<?php
class Result {
  private $db;
  public function __construct(DB $db) {
    $this->db = $db->conn;
  }
  public function getStudentMarks($student_id) {
    $sql = "SELECT subject, marks_obtained FROM marks WHERE student_id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    return $stmt->get_result();
  }
  public function predictFinalScore($student_id) {
    $marks = $this->getStudentMarks($student_id);
    $x = [];
    $y = [];
    while ($row = $marks->fetch_assoc()) {
      $x[] = count($x) + 1;
      $y[] = $row['marks_obtained'];
    }
    $n = count($x);
    if ($n < 2) return "Not enough data";
    $sum_x = array_sum($x);
    $sum_y = array_sum($y);
    $sum_xy = array_sum(array_map(fn($a, $b) => $a * $b, $x, $y));
    $sum_x2 = array_sum(array_map(fn($a) => $a * $a, $x));
    $m = ($n * $sum_xy - $sum_x * $sum_y) / ($n * $sum_x2 - $sum_x * $sum_x);
    $b = ($sum_y - $m * $sum_x) / $n;
    $predicted = $m * ($n + 1) + $b;
    return round($predicted, 2);
  }
}
?>