export default function experienceModal(modalId: string) {
  return {
    modalId,
    open(): void {
      const dialog = document.getElementById(this.modalId);

      if (dialog instanceof HTMLDialogElement && !dialog.open) {
        dialog.showModal();
      }
    },

    close(): void {
      const dialog = document.getElementById(this.modalId);

      if (dialog instanceof HTMLDialogElement) {
        dialog.close();
      }
    },

    closeOnBackdrop(event: MouseEvent): void {
      if (event.target === event.currentTarget) {
        this.close();
      }
    },
  };
}
